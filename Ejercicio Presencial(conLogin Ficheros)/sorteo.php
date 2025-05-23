<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>
    <div class="container">
        <form action="sorteo.php" method="post">
            <fieldset>
                <legend>Sorteo de pedido</legend>
                <input type="submit" value="Realizar sorteo" name="sorteo" >
            </fieldset>
        </form>

        <?php
        if (isset($_POST['sorteo'])) {
            $fichero = 'pedidos.txt';
            if (file_exists($fichero)) {
                $archivo = fopen($fichero, 'r');
                $pedidos = [];

                while (($linea = fgets($archivo)) !== false) {
                    $linea1 = trim($linea);
                    $datos = explode(';', $linea1);

                    if (count($datos) === 5) {
                        $pedidos[] = $datos[0];//guardamos solo los nombre

                    }
                }
                fclose($archivo);

                if (!empty($pedidos)) {
                    $sorteo = rand(0, count($pedidos) -1);
                    $ganador = $pedidos[$sorteo];

                    echo "<p>¡El ganador del sorteo es: <strong>$ganador</strong></p>";
                }else {
                    echo "<p>No hay pedidos registrados en este sorteo.</p>";
                }
            }else {
                echo "<p style='color: red;'>El archivo <strong>$fichero</strong> no existe.</p>";
            }
        }
        ?>
    </div>
</body>
</html>