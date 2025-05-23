<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
</head>
<body>
    <div class="container">
        <form action="pedido.php" method="post">
            <fieldset>
                <legend>Pedido</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" required>
                <label for="producto">Productos:</label>
                <select name="producto" required>
                    <option value="">Selecione un producto</option>
                    <option value="Iphone-11">Iphone 11</option>
                    <option value="Roomba">Roomba</option>
                    <option value="Reloj">Reloj</option>
                </select>
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" min="1" required>
                <input type="submit" value="Confirmar" name="confirmar">
                <a href="login.php"></a>
            </fieldset>
        </form>
        <?php
        if (isset($_REQUEST['confirmar'])) {
            $nombre = trim(strip_tags($_POST['nombre']));
            $direccion = trim(strip_tags($_POST['direccion']));
            $producto = trim(strip_tags($_POST['producto']));
            $cantidad = (int)$_POST['cantidad'];


            if (!empty($producto) && $cantidad > 0) {
                $fichero = 'pedidos.txt';
                $fecha = date('Y-m-d H:i:s');

                $registro = implode(';', [$nombre, $direccion,$producto,$cantidad,$fecha]);
                $archivo = fopen($fichero, 'a');

                fputs($archivo, $registro .PHP_EOL);
                fclose($archivo);

                
                echo "<p>Pedido guardado correctamente ✔ </p>";
            }else{
                echo "<p>Por favor selecione un producto válido y una cantidad mayor a 0</p>";
            }
        }

        ?>
    </div>
</body>
</html>