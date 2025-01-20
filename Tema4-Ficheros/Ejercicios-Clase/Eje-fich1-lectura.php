<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $archivo = 'clase2.txt';

    $lectura = fopen($archivo, 'r');

    echo "<p>El contendido del fichero es: </p><br>";
    if ($archivo) {
        while (($linea = fgets($lectura)) !== false) {
            echo $linea . "<br>";
        }
    
        fclose($lectura);
    
    }else{
        echo "No se pudo leer el fichero";
    }
    
    ?>
</body>
</html>