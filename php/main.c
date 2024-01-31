// C++ code
int rojo = 11;
int azul = 10;
int verde = 9;
void setup(){
  Serial.begin(9600);
  pinMode(rojo, OUTPUT);
}

void loop(){
  int lectura = analogRead(A0);
  lectura = map(lectura, 0, 1023, 0, 255);
  analogWrite(11, lectura);
  Serial.println(lectura);
  delay(100);
}