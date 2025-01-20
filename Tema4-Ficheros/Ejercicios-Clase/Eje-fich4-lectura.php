<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //se utiliza gets.content para obtener el archivo como cadena

    $archivo = 'clase411.txt';

    //este file_get_contents coge el archivo que sea y lo muestra sea el tamaño que sea 
    $contenido = file_get_contents($archivo);
    echo "El contendi recibido es: " . $contenido;
    ?>
</body>
</html>