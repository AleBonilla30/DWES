<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombreArchivo = 'nombres.txt';

    $archivo = fopen($nombreArchivo, 'w');//la w es para escribir pero si por ejemplo ese archivo ya existe lo borra y escribe lo nuevo
    $nombres = ["Alejandra", "Damaris", "Alma", "Jose", "Jorge", "Maria"];


    for ($i=0; $i <= count($nombres) ; $i++) { //count es el length para saber la longitud del array

        fwrite($archivo, $nombres[$i] . PHP_EOL);//PHP_EOL esto es end of line es un salto de linea
    }

    fclose($archivo);
    echo"Creando el fichero";


    ?>
</body>
</html>