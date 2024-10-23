<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
<?php
/*Escribe un programa que muestre en dos columnas:  Numero -  cuadrado del numero
De 10 números aleatorios entre 5 y 20. */
echo "<table border = '1' whith = 50% text-aling = 'center'>";
echo "<tr><th>Numero</th><th>Cuadrado</th></tr>";

for ($i=0; $i <10 ; $i++) { 
    $numero = rand(5,20);
    $cuadrado = pow($numero,2);
    echo "<tr><td>$numero</td><td>$cuadrado</td></tr>";
}

echo "</table>";


?>
</body>
</html>


