<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="container">
    <form action="login.php" method="post">
        <fieldset>
            <legend>Iniciar Sesión</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <label for="pass">Contraseña:</label>
            <input type="password" name="pass">
            <input type="submit" value="Enviar" name="enviar">
        </fieldset>

        <?php
        if (isset($_POST['enviar'])) {
            $nombre = trim(strip_tags($_POST['nombre']));
            $password = trim(strip_tags($_POST['pass']));

            $fichero = 'clave.txt';
            if (file_exists($fichero)) {

                $archivo = fopen($fichero, 'r');
                $estaUsuario = false;
                
                while (($linea = fgets($archivo)) !== false) {
                    $linea = trim($linea);
                    $comprobar = explode(',', $linea);

                    $nombreComprobar = $comprobar[0];
                    $passComprobar = $comprobar[1];

                    if ($nombre === $nombreComprobar && $password === $passComprobar) {
                        $estaUsuario = true;

                        echo "<p>Bienvenido, $nombre</p>";
                        echo "<ul>";
                        echo "<li><a href='pedido.php'>Hacer pedido</a></li>";
                        echo "<li><a href='mostrar.php'>Mostrar pedidos</a></li>";
                        echo "<li><a href='calcular.php'>Calcular precio del pedido</a></li>";
                        echo "</ul>";
                        echo "<hr>";
                    }else{
                        echo "Usuario no encontrado ❌";
                    }

            }
            fclose($archivo);
            }
            

        }
        ?>
    </form>

    </div>
    

</body>
</html>