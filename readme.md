Domotica.

## Primer Parcial

Rutas:

<ul>
    <li>Route "/": Home</li>
    <li>Route "/setState/{lm35}/{fotoresistor}": Agrega un estado del lm35 y el fotoresistor</li>
    <li>Route "/getState": Regresa el estado del lm35 y el fotoresistor</li>
    <li>Route "/setDC/{state}": Pone el estado al motor DC [state = false or true]</li>
    <li>Route "/setBuzzer/{state}": Pone el estado al Buzzer [state = false or true]</li>
    <li>Route "/setLED/{state}": Pone el estado al LED [state = false or true]</li>
    <li>Route "/getExternal": Regresa los estados del LED DC y Buzzer [Ejemplo: 1,1,1 -> Buzzer, LED, DC]</li>
</ul>
