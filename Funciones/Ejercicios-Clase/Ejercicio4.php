<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function suma($num1, $num2) {
        return $num1 + $num2;
    }
    $a = rand(1,100);
    $b = rand(1,100);

    $suma = suma($a, $b);
    print "<p>$a + $b = $suma</p>\n";
    print "\n";
    print "<p>$a + $b = ". suma($a, $b) ."</p>\n";

    ?>
</body>
</html>