using System.Text;
using System.Text.Json;
using Microsoft.Extensions.Configuration;

public class GeminiService
{
    private readonly string _apiKey;
    private readonly HttpClient _httpClient;

    public GeminiService(HttpClient httpClient, IConfiguration configuration)
    {
        _httpClient = httpClient;
        _apiKey = configuration["GeminiSettings:ApiKey"] ?? string.Empty;
    }

    public async Task<string> GenerateTourDataAsync(string userPrompt)
    {
        // Gamitin ang tamang endpoint format na may ?key=
        var url = $"https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={_apiKey}";

        string systemPrompt = @"
Ikaw ang AI Tour Assistant para sa 'Meesuk Travel and Tours'. 
Basahin nang maayos ang hiling ng user (kabilang ang destinasyon, bilang ng araw/gabi tulad ng 3d2n, at uri ng tour tulad ng beach o city tour). 
Magbalik ng STRICT JSON format lamang para mapunan ang Tour form. Huwag maglagay ng anumang extra text o backticks. Sundin ang eksaktong keys na ito:
{
  ""TourName"": ""Pangalan ng Tour Package batay sa prompt"",
  ""Destination"": ""Destinasyon batay sa prompt"",
  ""LandscapeType"": ""Piliin ang isa: Mountain / Highlands, Coastal / Beach, Urban / City, Forest / Jungle, Island, o Countryside"",
  ""IntensityLevel"": ""Piliin ang isa: Low, Moderate, High, o Extreme"",
  ""Activities"": ""Piliin o ibagay ang isa: Hiking & Trekking, Swimming & Island Hopping, Sightseeing & Cultural Tour, Food Trip & Leisure, o Snorkeling & Diving"",
  ""Description"": ""Buong deskripsyon ng tour batay sa prompt"",
  ""BasePrice"": 4500.00,
  ""TotalCapacity"": 14,
  ""DepartureDate"": ""2026-11-01T08:00"",
  ""ReturnDate"": ""2026-11-03T17:00"",
  ""ItineraryHighlights"": ""Mga highlights na naka-comma separated""
}
";

        var fullPayload = new
        {
            contents = new[]
            {
                new { parts = new[] { new { text = $"{systemPrompt}\n\nUser Request: {userPrompt}" } } }
            }
        };

        var requestMessage = new HttpRequestMessage(HttpMethod.Post, url);
        requestMessage.Content = new StringContent(JsonSerializer.Serialize(fullPayload), Encoding.UTF8, "application/json");

        var response = await _httpClient.SendAsync(requestMessage);
        var responseString = await response.Content.ReadAsStringAsync();

        if (!response.IsSuccessStatusCode)
        {
            throw new Exception($"Gemini API Error ({response.StatusCode}): {responseString}");
        }

        using var doc = JsonDocument.Parse(responseString);
        
        var rawText = doc.RootElement.GetProperty("candidates")[0]
                                   .GetProperty("content")
                                   .GetProperty("parts")[0]
                                   .GetProperty("text").GetString();

        return rawText.Replace("```json", "").Replace("```", "").Trim();
    }
}
