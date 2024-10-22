<?php
//Realiza un programa que nos diga cuántos dígitos tiene un número aleatorio entre (0 y 9999). Mostrar el número y la cantidad de dígitos.

$numero = rand(0,9999);
echo "<p>El numero aleatorio es: ".$numero. "</p>";
$digitos = strlen($numero);//strlen es para calcular el numero de caracteres incluye espacios
print " <p>La cantidad de digitos que tiene el numero es $digitos</p>";

?>