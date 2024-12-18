<?php
if (isset($_POST['web']) && isset($_POST['color'])) {
    $web = $_POST['web'];
    $color = $_POST['color'];

    //se crea la cookies con la duracion de la cookie
    setcookie("web", $web, time() + 3*24*3600);
    setcookie("color", $color, time() + 3*24*3600);
}elseif (isset($_COOKIE['web'])) { //si las cookies ya existen (no se ha enviado un formulario pero las cookies existen en el navegador)
    //se le asigna sus valores a web y color
    $web = $_COOKIE['web'];
    $color = $_COOKIE['color'];
}

//borrado de cookies

if (isset($_POST['borrarCookies'])) {
    //elimina las cookies al asignarle null y el tiempo negativo que expira inmediatamente
    setcookie("web", null, -1); 
    setcookie("color", null, -1);

    //borra las variables web y color 
    unset($web);
    unset($color);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
    <style>
        body{
            background-color: #f5f5f5;
            font-family: cursive;
            font-size: 30px;
        }
        input{
            width: 20%;
            border: 1px solid silver;
            border-radius: 15px;
            padding: 10px;
        }
        input:focus{
            border-color: rgb(82, 156, 156);
            box-shadow: 0 0 5px rgba(82, 156, 156, 0.5);
            outline: none;
        }
        input[type="submit"]{
            width: 15%;
            color: white;
            background-color: darkslategrey;
        }
        input[type="submit"]:hover{
            background-color: #436e6e ;
        }

    </style>
</head>
<body>
    <form action="#" method="post">
        Web: <input type="text" name="web"><br>
        Color: <input type="text" name="color"><br>
        <input type="submit" value="Aceptar">
    </form>
    <?php
    if (!isset($web)) {
        echo "<p>No has elegido un color favorito</p><br>";
        echo "<p>Utiliza el siguiente formulario para hacerlo.</p><br>";
    }else {
        echo "<h2>Tu web favorita: $web</h2>";
        echo "<h2>Tu color favorito: $color</h2>";
        echo "<p>Introduce nuevos nombres si quieres cambiar las preferencias.</p>";
    }
    ?>
    <hr>
    <form action="#" method="post">
        <!-- con esto el servidor obtiene (borrarCookies = si) por eso se verifica con isset y se ejecuta el codigo de borrado -->
        <input type="hidden" name="borrarCookies" value="si"><!-- como el valor es si se ejecuta el codigo de borrado de cookies, se envia datos al servidor sin mostrarlos  al usuario -->
        <input type="submit" value="Borrar cookies">
    </form>

    

</body>
</html>