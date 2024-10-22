<?php
//concepto de contador
$cont = 0;
for ($i=0; $i <9 ; $i++) { 
    $dado = rand(1,6);
    print "<img src = './img/$dado.jpg' width = 100 height = 100>";

    if ($dado == 2) {
        $cont++;
    }
}
print "<h1>Ha salido $cont dos(es).</h1>"
?>