<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //leer un archivo de texto 
    $archivoLeer = 'pepe.txt';
    $archivo = fopen($archivoLeer, 'r');

    while (!feof($archivo)) {
        $lectura = fgets($archivo);
        echo $lectura . "<br>";
    }
    fclose($archivo)
    ?>
</body>
</html>