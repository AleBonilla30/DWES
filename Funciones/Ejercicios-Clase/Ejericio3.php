<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function saludo($nombre, $veces) {
        for ($i=0; $i < $veces; $i++) { 
            print "<p>Hola, $nombre</p>\n";
            print "\n";
        }
    }

    $aleatorio = rand(1,10);

    saludo("Alejandra", $aleatorio);

    ?>
</body>
</html>