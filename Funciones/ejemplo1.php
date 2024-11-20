<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <?php

    function suma($x, $y)  {
        $s = $x + $y;
        return $s;
    }

    $a = 1;
    $b = 2;

    $c = suma($a, $b);
    print $c;

    ?>
</body>
</html>