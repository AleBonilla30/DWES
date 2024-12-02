<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function calcularMedia($num1, $num2, $num3 = "aritmetica") {
        if ($num3 == "aritmetica") {
            $media = ($num1 + $num2)/2;
        }elseif ($num3 == "geometrica") {
            $media = ($num1 * $num2)/2;
        }
        return $media;
    }

    $dato1 = rand(1,50);
    $dato2 = rand(1,100);

    //el tercer argumento indica el tipo de media a calcular

    $media = calcularMedia($dato1, $dato2,  "geometrica");
    print "<p>La media geometrica de $dato1 y $dato2 es <strong>$media</strong></p>\n";
    print "\n";

    //al no indicarle nada al tercer parameto calcular la media aritmetica
    $media = calcularMedia($dato1, $dato2);
    print "<p>La media aritmetica de $dato1 y $dato2 es <strong>$media</strong></p>\n";




    ?>
</body>
</html>