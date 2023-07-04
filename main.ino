
#ifdef ESP32
#include <WiFi.h>
#include <HTTPClient.h>
#else
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#endif

// Libraries for OLED Display
#include <Wire.h>

const char* ssid     = "YOUR SSID";
const char* password = "YOUR PASSWORD";
const char* serverName = "http://YOUR IP /POST.php";
String apiKeyValue = "esp";
void setup()
{
  Serial.begin(115200);

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop()
{
 if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;
    
    // Your Domain name with URL path or IP address with path
    http.begin(client, serverName);
   String nama = "Lahan 1 ";
   int kelembaban1 = random(100);
   int np= random(255);
   int pn=random(255);
   int kn =random(255);
   int php = random(12);

   String kelembaban = String(kelembaban1);
   String n = String(np);
   String p = String(pn);
   String k = String(kn);
   String ph = String(php);
    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&nama=" + nama + "&sensor_kelembaban=" + kelembaban + "&sensor_n=" + n + "&sensor_p=" + p + "&sensor_k=" + k + "&sensor_ph=" + ph;
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    int httpResponseCode = http.POST(httpRequestData);
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  //Send an HTTP POST request every 30 seconds
  delay(300);  

}
