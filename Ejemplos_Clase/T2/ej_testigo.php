<?php
$hayDos = false;
for ($i=0; $i <5 ; $i++) { 
    $dado = rand(1,6);
    echo "<p>Tirada de dado: <img src = './img/$dado.jpg' width = 100 height = 100></p>\n";

    if ($dado == 2) {
        $hayDos = true;
    }
}//fin del bicle

if ($hayDos == true){
    echo "<p>Ha salido al menos un dos</p>\n";
}else{
    echo "<p>No ha salido ni un dos</p>\n";
}

?>