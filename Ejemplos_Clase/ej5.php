<?php
define("PI", 3.14);//contantes
print "<p>El valor de pi es ". PI . "</p>";


$valor = 9;
//$valor++; //++ suma 1 --resta1

print "<p>" . $valor++ . "</p>\n";
print "<p>" . $valor-- . "</p>\n";

$numero = 4.3555;
$numero1 = round ($numero,2);//redondea al numero de decimales
print "<p>Round " . $numero1 . "</p>\n";
$numero2 = floor ($numero);//redondea al entero mas cercano por debajo
print "<p>Floor " . $numero2 . "</p>\n";
$numero3 = ceil ($numero);//redondea al entero mas cercano por encima de su valor
print "<p>Ceil " . $numero3 . "</p>\n";

$aleatorio = rand(1,100);
echo "El numero aleatorio es $aleatorio";
?>