using Microsoft.EntityFrameworkCore;
using _UPDATED__FrontEnd_Capstone.Models;
using _UPDATED__FrontEnd_Capstone.Services;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddControllersWithViews();

// Register the Database 
string connectionString = builder.Configuration.GetConnectionString("DefaultConnection")!;
builder.Services.AddDbContext<AppDbContext>(options =>
    options.UseMySQL(connectionString));

//email service
builder.Services.AddScoped<IEmailService, EmailService>();

//background service
builder.Services.AddHostedService<TourNotificationBackgroundService>();

builder.Services.AddHttpClient<GeminiService>();

var app = builder.Build();


if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Home/Error");
    app.UseHsts();
}

app.UseHttpsRedirection();
app.UseRouting();

app.UseAuthorization();

app.MapStaticAssets();

app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Home}/{action=Login}/{id?}")
    .WithStaticAssets();

app.Run();
