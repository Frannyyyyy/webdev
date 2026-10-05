using System.Threading.Tasks;

namespace _UPDATED__FrontEnd_Capstone.Services;

public interface IEmailService
{
    Task SendEmailAsync(string email, string subject, string htmlMessage);
}
