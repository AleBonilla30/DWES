<?php
//Muestra la tabla de multiplicar de un número generado de manera aleatoria entre 1 y 10. El resultado en formato <table>

$numero = rand(1,10);
echo "<h1>La tabla de multiplicar del numero $numero</h1>";
echo "<table border ='1' whith = 50% >";
echo "<tr><th>Multiplicacion</th></tr>";
for ($i=1; $i <=10 ; $i++) { 
    $mult = $numero * $i;
    echo "<tr><td>$numero x $i = $mult</td></tr>";
}
echo "</table>";



?>