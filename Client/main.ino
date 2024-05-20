#include <DHT.h>

#define DHTPIN 2     // Pin à laquelle le capteur est connecté
#define DHTTYPE DHT11 // Type de capteur DHT utilisé

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
  dht.begin();
}

void loop() {
  delay(2000);
  
  float temperature = dht.readTemperature();
  float humidy = dht.readHumidity();
  if (isnan(temperature)) {
    Serial.println("Erreur lors de la lecture du capteur !");
  } else {
    Serial.print("Température : ");
    Serial.print(temperature);
    Serial.println(" °C");
    Serial.print("Humidity : ");
    Serial.print(humidy);
    Serial.println(" %");
  }
}
