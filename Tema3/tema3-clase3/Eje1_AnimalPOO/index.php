<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include_once 'Pinguino.php';
    include_once 'Gato.php';
    include_once 'Perro.php';
    include_once 'Lagarto.php';


    $garfiel = new Gato("macho", "romano");
    $tom = new Gato ("macho");
    $lisa = new Gato ("hembra");
    $silvestre = new Gato ("macho");

    echo $garfiel. "<br>";
    echo $tom. "<br>";
    echo $lisa. "<br>";
    echo $silvestre. "<br><hr>";
    
    $miLoro = new Ave();
    echo $miLoro->aseate()."<br>";
    echo $miLoro->vuela()."<br><hr>";

    $pingui = new Pinguino("hembra");
    echo $pingui->aseate()."<br>";
    echo $pingui->vuela()."<br>";
    echo $pingui->programa()."<br><hr>";

    $kiara = new Perro("hembra", "labrador");
    echo $kiara->duerme()."<br>";
    echo $kiara->dameLaPata()."<br>";
    echo $kiara->amamanta()."<br>";
    echo $kiara->cuidaCrias()."<br><hr>";


    $godzilla = new Lagarto("macho");
    echo $godzilla->tomaElSol()."<br>";
    echo $godzilla->duerme()."<br>";


    ?>
</body>
</html>