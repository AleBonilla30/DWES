<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombreArchivo = 'clase2.txt';
    $mensaje = 'Mañana es viernesssssssssss por fin....';
    
    //se abre el fichero
    $archivo = fopen($nombreArchivo, 'a') ;//a => abre a modo lectura append, w => write, r => es solo lectura read 

    //echo
    //se crea y se escribe el fichero
    fwrite($archivo, $mensaje);
    echo "<p>Escribiendo el fichero</p>";
    //se cierra
    fclose($archivo)

    ?>
</body>
</html>