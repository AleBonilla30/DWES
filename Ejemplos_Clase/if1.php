<?php
print "<h1>Tirada de dado </h1>\n";
$dado = rand(1,6);//genera numero aleatorios entre dos 
print "<p>Ha sacado un $dado.</p>\n";

if ($dado == 6) {
    print "<h4>Has sacado la tirada maxima $dado.</h4>";
}else{
    print "<p>Tienes menos de 6</p>\n";
}

print "<h2>¡Hasta pronto!</h2>"
?>