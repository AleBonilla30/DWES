<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
<?php
//Realiza un programa que nos diga cuántos dígitos tiene un número aleatorio entre (0 y 9999). Mostrar el número y la cantidad de dígitos.

$numero = rand(0,9999);
echo "<p>El numero aleatorio es: ".$numero. "</p>";
$digitos = strlen($numero);//strlen es para calcular el numero de caracteres incluye espacios
print " <p>La cantidad de digitos que tiene el numero es $digitos</p>";


//se puede hacer de las dos maneras
if ($numero <= 10){
    print " <p>La cantidad de digitos que tiene el numero es $digitos</p>";
}elseif ($numero <=100) {
    print " <p>La cantidad de digitos que tiene el numero es $digitos</p>";
}elseif ($numero <= 1000) {
    print " <p>La cantidad de digitos que tiene el numero es $digitos</p>";
}elseif ($numero <= 10000) {
    print " <p>La cantidad de digitos que tiene el numero es $digitos</p>";
}
?>
</body>
</html>



