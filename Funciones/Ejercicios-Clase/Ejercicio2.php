<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function prueba()  {

        // Intentamos escribir el valor de la variable $a
        // pero como no está definida, se produce un aviso
        print "<p>La variable a es $a.</p>\n";
        print "\n";
    }
    $a = 100;
    print "<p>La variable a es $a.</p>\n";
    print "\n";

    //llamas a la funcion
    prueba();
    //vuelves a escribir la variable
    print "<p>La variable a es $a.</p>\n";
    ?>
</body>
</html>