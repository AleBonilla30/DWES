<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero = $_REQUEST['numero'];
    $fichero = 'numeros.txt';
    $cont = 0;

    $archivo = fopen($fichero, 'r');
    while (!feof($archivo)) {
        $linea = fgets($archivo);

        if (intval($linea) == intval($numero)) {//intval convierte una cadena o valor en su equivalente entero
            $cont++;
        }
    }
    fclose($archivo);

    print "<p>El numero $numero aparece $cont veces en el fichero $fichero.</p>\n";
    ?>
</body>
</html>