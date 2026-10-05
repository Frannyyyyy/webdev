using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;
using Microsoft.Extensions.Logging;
using Microsoft.EntityFrameworkCore;
using _UPDATED__FrontEnd_Capstone.Models;
using System;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace _UPDATED__FrontEnd_Capstone.Services;

public class TourNotificationBackgroundService : BackgroundService
{
    private readonly IServiceProvider _services;
    private readonly ILogger<TourNotificationBackgroundService> _logger;

    public TourNotificationBackgroundService(IServiceProvider services, ILogger<TourNotificationBackgroundService> logger)
    {
        _services = services;
        _logger = logger;
    }

    protected override async Task ExecuteAsync(CancellationToken stoppingToken)
    {
        _logger.LogInformation("Tour Notification Background Service is running automatically.");

        while (!stoppingToken.IsCancellationRequested)
        {
            try
            {
                using (var scope = _services.CreateScope())
                {
                    var _context = scope.ServiceProvider.GetRequiredService<AppDbContext>();
                    var _emailService = scope.ServiceProvider.GetRequiredService<IEmailService>();

                    var tours = await _context.Tours
                        .Include(t => t.Bookings)
                        .ToListAsync(stoppingToken);

                    int emailsSent = 0;

                    foreach (var tour in tours)
                    {
                        // Kalkulahin ang slots filled mula sa validated bookings (tulad ng nasa TourController)
                        int totalSlotsUsed = tour.Bookings != null 
                            ? tour.Bookings.Where(b => b.Status == "Validated").Sum(b => b.Slots) 
                            : 0;
                        tour.SlotsFilled = totalSlotsUsed;

                        double occupancyRate = tour.TotalCapacity > 0 ? (double)tour.SlotsFilled / tour.TotalCapacity : 0;

                        // 1. KUNG CANCELLED NA
                        if (tour.IsCancelled || tour.Status == "Cancelled")
                        {
                            var joinerEmails = tour.Bookings
                                .Where(b => !string.IsNullOrEmpty(b.LeadEmail) && b.IsApproved)
                                .Select(b => b.LeadEmail)
                                .Distinct()
                                .ToList();

                            foreach (var email in joinerEmails)
                            {
                                string subject = $"[Important Notice] Tour Cancelled: {tour.TourName}";
                                string htmlMessage = $@"
                                    <h2>Tour Cancellation Notice</h2>
                                    <p>Dear Joiner,</p>
                                    <p>We regret to inform you that the tour <strong>{tour.TourName}</strong> (Destination: {tour.Destination}) scheduled for departure on <strong>{tour.DepartureDate:yyyy-MM-dd}</strong> has been cancelled.</p>
                                    <p>Our team will reach out to you regarding your refund process shortly.</p>
                                    <br/>
                                    <p>Best regards,<br/><strong>J-Hub Team</strong></p>";

                                await _emailService.SendEmailAsync(email, subject, htmlMessage);
                                emailsSent++;
                            }
                        }
                        // 2. KUNG GO NA (Base sa reference mo: occupancy >= 0.5 o 50%)
                        else if (occupancyRate >= 0.5)
                        {
                            var joinerEmails = tour.Bookings
                                .Where(b => !string.IsNullOrEmpty(b.LeadEmail) && b.IsApproved)
                                .Select(b => b.LeadEmail)
                                .Distinct()
                                .ToList();

                            foreach (var email in joinerEmails)
                            {
                                string subject = $"🎉 It's a GO! Your Tour is Confirmed: {tour.TourName}";
                                string htmlMessage = $@"
                                    <h2>Great News! Your Tour is Officially a GO!</h2>
                                    <p>Dear Joiner,</p>
                                    <p>We are thrilled to announce that the participant threshold for <strong>{tour.TourName}</strong> has been successfully met!</p>
                                    <ul>
                                        <li><strong>Destination:</strong> {tour.Destination}</li>
                                        <li><strong>Departure Date:</strong> {tour.DepartureDate:yyyy-MM-dd}</li>
                                    </ul>
                                    <p>Get ready for your trip!</p>
                                    <br/>
                                    <p>Warm regards,<br/><strong>J-Hub Team</strong></p>";

                                await _emailService.SendEmailAsync(email, subject, htmlMessage);
                                emailsSent++;
                            }
                        }
                    }

                    if (emailsSent > 0)
                    {
                        _logger.LogInformation("Background service successfully sent {Count} notification emails.", emailsSent);
                    }
                }
            }
            catch (Exception ex)
            {
                _logger.LogError(ex, "Error occurred while executing automated tour notification check.");
            }

            await Task.Delay(TimeSpan.FromMinutes(1), stoppingToken);
        }
    }
}
