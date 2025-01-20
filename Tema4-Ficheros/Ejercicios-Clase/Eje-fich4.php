<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $archivoALeer = 'clase411.txt';
    $mensaje = 'Hoy es Viernesssssss......';

    $archivo = fopen($archivoALeer, 'a');//w- write, a-appende
    //cuando se usa w- borra lo que ya tenia el fiche y pone lo nuevo
    //con a- lo escribe al final de lo que habia en el fichero sin borrar lo que ya existia

    //fputs y fwrite hace lo mismo, escribir en un fichero 
    fputs($archivo,$mensaje);//esto añade al fichero
    echo "<p>Fichero grabado</p>";
    fclose($archivo)//luego si lo quieres leer se hace con r
    ?>
</body>
</html>