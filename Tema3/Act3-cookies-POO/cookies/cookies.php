<?php
$background = "#ffffff"; // Color predeterminado 1 (blanco)
$background2 = "#000000"; // Color predeterminado 2 (negro)

//comprobar si se ha pulsado para cambiar
if (isset($_REQUEST['cambiar'])) {

    if (isset($_REQUEST['color1']) && isset($_REQUEST['color2']) ) {
        
        $background = $_REQUEST['color1'];
        $background2 = $_REQUEST['color2'];
    }

    //se crea las cookie
    setcookie("color1", $background, time() + 300);
    setcookie("color2", $background2, time() + 300);

//si las cookies existen se le asigna su valor
}elseif (isset($_COOKIE['color1']) && isset($_COOKIE['color2'])) {
    $background = $_COOKIE['color1'];
    $background2 = $_COOKIE['color2'];
}


if (isset($_REQUEST['borrarCookie'])) {
    setcookie("color1", null, time()-1);
    setcookie("color2", null, time()-1);

    $background = "#ffffff";
    $background2 = "#000000";
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambia de color</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background: linear-gradient(135deg,<?php echo $background ?>, <?php echo $background2 ?>) ;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Personaliza el fondo de esta página a tu gusto.</h1>
        <p>Elige un color en el formulario y pulsa en 'Cambiar color' para actualizar el fondo.</p>
        <form action="#" method="post">
            <label for="color1">Seleciona un color:</label>
            <input type="color" name="color1" value="<?php echo $background?>" required>
            <label for="color2">Selecione un segundo color:</label>
            <input type="color" name="color2" value="<?php echo $background2?>" required>
            <input type="submit" value="Cambiar color" name="cambiar">
            
        </form>
        <form action="#" method="post">
                <input type="hidden" name="borrarCookie" value="si">
                <input type="submit" value="Reset cookie">
        </form>
    </div>
</body>
</html>