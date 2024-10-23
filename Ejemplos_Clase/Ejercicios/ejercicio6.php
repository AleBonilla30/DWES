<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
<?php
/* Un programa que genere 2 tiradas de 3 dados(simulando 2 jugadores). 
Muestre las dos tiradas y me diga cual tiene mayor puntuación(sumando las tiradas) */
$totalTirada1 = 0;
$totalTirada2 = 0;
print "<h1>Tirada 1</h1>\n";
for ($i=0; $i < 3 ; $i++) { 
    $dado = rand(1,6);
    print "<img src ='./img/$dado.jpg' width =100 height = 100/>\n";
    $totalTirada1 += $dado;

}
print "<h3>Has obtenido  $totalTirada1 puntos en la tirada 1</h3>";


print "<h1>Tirada 2</h1>\n";
for ($i=0; $i < 3 ; $i++) { 
    $dado = rand(1,6);
    print "<img src ='./img/$dado.jpg' width =100 height = 100/>\n";
    $totalTirada2 += $dado;

}
print "<h3>Has obtenido  $totalTirada2 puntos en la tirada 1</h3>\n";

if ($totalTirada1 > $totalTirada2) {
    print "<h4>La tirada uno es la mas alta tiene un total de $totalTirada1 puntos.</h4><br>"; 
}elseif ($totalTirada2 > $totalTirada1) {
    print "<h4>La tirada dos es la mas alta tiene un total de $totalTirada2 puntos.</h4><br>"; 
}else {
    print "<h4>¡Es un empate! Ambas tiradas tienen $totalTirada1 puntos.</h4>";
}

?>
</body>
</html>


