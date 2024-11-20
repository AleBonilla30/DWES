<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Argumentos por defectos

    function muestraNombre($titulo = "Sr.") {
        print "Estimado $titulo\n";
    }

    ?>

    muestraNombre();
</body>
</html>