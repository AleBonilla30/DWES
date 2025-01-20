<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $fichero = 'nombres.txt';

    $archivo = fopen($fichero, 'r');

    while (!feof($archivo)) {
        $linea = fgets($archivo);
        echo $linea . "<br>";
    }


    ?>
</body>
</html>