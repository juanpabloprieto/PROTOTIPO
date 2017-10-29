/*
  Web Server by Juan Pablo Prieto
  Email: prietojuanpablo763@gmail.com
*/

#include <SPI.h>
#include <Ethernet.h>
#include <SD.h>
File ArchivoRecibido;
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(169,254,246, 179);//direccion ip de la placa de arduino
IPAddress subnet(255,255,255,0);// mascara
EthernetServer server(80);// puerto por defecto
//Asignacion de pines 
const int analogPin1 = A0;// input analogica del sensor de temperatura en el pin AO
const int analogPin2 = A5;// input analogica del sensor de humedad en el pin A5
//Variables
int temperaturaminima,temperaturamaxima,humedadminima,humedadmaxima,emergencia;
int sensorTemperatura = 0; //declaro las variables con valor cero
int sensorHumedad = 0;//declaro variable con valor cero

// declaracion de pines
const int ventiFrio=8;// declaro una variable con la asignacion de un pin 8 para ventilador de aire frio.
const int ventiCaliente=2;// declaro una variable con la asignacion de un pin 2 para ventilador de aire caliente
const int regadio=3;// declaro una variable con la asignacion de un pin 2 para ventilador de aire caliente


void setup() {
 // Open serial communications and wait for port to open:
  Serial.begin(9600);
   
  // Inicio del Ethernet connection and the server:
  Ethernet.begin(mac, ip,subnet);
  Serial.print("La dir ip es: ");
  Serial.println(Ethernet.localIP());
   server.begin();//Arranca el servidor
   pinMode(ventiCaliente, OUTPUT);//le indico al pin que sera una salida digital
   pinMode(ventiFrio, OUTPUT);//le indico al pin que sera una salida digital
  pinMode (regadio, OUTPUT);//le indico al pin que sera una salida digital
   
   
  }


void loop() {
  //variables 
                ////////////////////////////////////////////
               //lectura de sensores/////////////////////////////
                  sensorTemperatura = analogRead(analogPin1);
                  sensorHumedad= analogRead(analogPin2);
          
  /////////////////////////////////////////////////////////
  // listen for incoming clients
  EthernetClient client = server.available();
  if (client) {
    Serial.println("new client");
    // an http request ends with a blank line
    boolean currentLineIsBlank = true;
    String orden="";
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
       orden.concat(c);
        Serial.print(c);
         if (c == '\n' && currentLineIsBlank) {
            // send a standard http response header
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/javascript");
          client.println("Access-Control-Allow-Origin: *");
          client.println();
          
          
          int datosRecibido = orden.indexOf("?");
             if(datosRecibido>-1){     //verifica si hay una orden nueva 
            String ordenRecibido    = orden.substring(6,11);//recibir orden
            String temin             = orden.substring(12,14);//recibir dato temperatura minima
            String temax             = orden.substring(14,16);//recibir dato temperatura maxima
            String humin             = orden.substring(16,18);//recibir dato humedad minima
            String humax             = orden.substring(18,20);//recibir dato humedad maxima
            
            
           
            //GUARDAR DATOS EN TARJETA DE MEMORIA
            
            if(ordenRecibido=="orden"){// si llega alguna orden
            
                 int temperaturaminima = temin.toInt();//convertir string a entero
                 int temperaturamaxima = temax.toInt();//convertir string a entero
                 int humedadminima = humin.toInt();//convertir string a entero
                 int humedadmaxima = humax.toInt();//convertir string a entero
               //condiciones para encender y apagar actuadores
               
                  if(sensorTemperatura >= temperaturamaxima )     {
                                                             digitalWrite(ventiCaliente, LOW);// apagar ventilador de aire caliente
                                                             digitalWrite(ventiFrio, HIGH);//encender ventilador de aire frio
                                                            }
                    else if (sensorTemperatura <= temperaturaminima){ 
                                                              digitalWrite(ventiFrio, LOW);//apagar ventilador frio
                                                              digitalWrite(ventiCaliente, HIGH);// encender ventilador de aire caliente
                                                             } 
                    else if (sensorHumedad >= humedadmaxima){ digitalWrite(regadio, HIGH);} // encender
                    else if (sensorHumedad <= humedadminima){ digitalWrite(regadio, LOW);} //apagar  
          
            //////////////////////////////////////////////////// ////////////////////////////////           
            }         
             
          
            
                                    
           ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                          
             //funcion para enviar los datos type json hacia el cliente                             
            client.print("datos({ sensorTemperatura : ");
            client.print(sensorTemperatura);
            client.print(",");
            client.print("sensorHumedad :  ");
            client.print(sensorHumedad);
            client.print(",");
            client.print("ventiFrio :  ");
            client.print(digitalRead(ventiFrio));
            client.print(",");
            client.print("ventiCaliente :  ");
            client.print(digitalRead(ventiCaliente));
           client.print("})");
          }
          break;\
        }
        if (c == '\n') {
          // you're starting a new line
          currentLineIsBlank = true;
        }
        else if (c != '\r') {
          // you've gotten a character on the current line
          currentLineIsBlank = false;
        }
      }
    }
    // give the web browser time to receive the data
    delay(50);
    // close the connection:
    client.stop();
    Serial.println("client disonnected");
  }
}
