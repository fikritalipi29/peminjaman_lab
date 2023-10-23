#include <ESP8266WiFi.h> 
#include <WiFiClient.h> 
#include <ESP8266HTTPClient.h> 
#include <SPI.h> 
#include <MFRC522.h> 
 
#define SS_PIN D2 
#define RST_PIN D1 
#define LED_G D3  // Define green LED pin 
#define BUTTON_PIN D4  // Define push button pin 
#define RELAY D0  // Relay pin 
#define BUZZER D8  // Buzzer pin 
#define ACCESS_DELAY 10000 
#define DENIED_DELAY 1000 
 
MFRC522 mfrc522(SS_PIN, RST_PIN); 
 
WiFiClient wifiClient; 
HTTPClient http; 
 
const char* ssid = "Fikri"; 
const char* password = "bambangsutejo01"; 
const char* serverUrl = "http://192.168.56.193/peminjaman_lab/api"; 
 
void setup() { 
  Serial.begin(115200); 
  SPI.begin(); 
  mfrc522.PCD_Init(); 
  WiFi.begin(ssid, password); 
  pinMode(LED_G, OUTPUT); 
  pinMode(BUTTON_PIN, INPUT_PULLUP); 
  pinMode(RELAY, OUTPUT); 
  pinMode(BUZZER, OUTPUT); 
  noTone(BUZZER); 
  digitalWrite(RELAY, HIGH); 
   
  while (WiFi.status() != WL_CONNECTED) { 
    delay(1000); 
    Serial.println("Connecting to WiFi..."); 
  } 
   
  Serial.println("Connected to WiFi"); 
  Serial.println("Put your card to the reader..."); 
  Serial.println(); 
} 
 
void loop() { 
   if (digitalRead(BUTTON_PIN) == LOW) // Check if the push button is pressed 
  { 
    Serial.println("Button access");  
    unlockDoor(); 
  }
  

  if (!mfrc522.PICC_IsNewCardPresent())  
  { 
    return; 
  } 
   
  if (!mfrc522.PICC_ReadCardSerial())  
  { 
    return; 
  } 
 
  
  // Show UID on serial monitor 
  Serial.print("UID tag :"); 
  String content = ""; 
   
  for (byte i = 0; i < mfrc522.uid.size; i++)  
  { 
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "); 
     Serial.print(mfrc522.uid.uidByte[i], HEX); 
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ")); 
     content.concat(String(mfrc522.uid.uidByte[i], HEX)); 
  } 
  Serial.println(); 
  Serial.print("Message : "); 
  content.toUpperCase(); 
 
   if (content.substring(1).length() > 0)  // Change here the UID of the card/cards that you want to give access 
  { 
    http.begin(wifiClient, serverUrl); 
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 
    int httpResponseCode = http.POST("rfid=" + content.substring(1)); 
     
    if (httpResponseCode > 0) { 
      Serial.print("HTTP Response code: "); 
      Serial.println(httpResponseCode); 
      String response = http.getString(); 
      Serial.println(response); 
       
      if (response == "SILAHKAN MASUK") { 
        unlockDoor(); 
      } else { 
        denyAccess(); 
      } 
       
    } else { 
      Serial.print("Error in sending data. HTTP Response code: "); 
      Serial.println(httpResponseCode); 
    } 
     
    http.end(); 
    mfrc522.PICC_HaltA(); 
    mfrc522.PCD_StopCrypto1(); 
    delay(3000); 
  } 
  else 
  { 
    Serial.println("Nomer Kartu Tidak Terbaca"); 
  } 

} 
 
void unlockDoor() { 
  digitalWrite(RELAY, LOW); 
  digitalWrite(LED_G, HIGH); 
  delay(ACCESS_DELAY); 
  digitalWrite(RELAY, HIGH); 
  digitalWrite(LED_G, LOW); 
} 
 
void denyAccess() { 
  tone(BUZZER, 300); 
  delay(DENIED_DELAY); 
  noTone(BUZZER); 
}
