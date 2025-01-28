<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Pedido</title>
</head>
<body>
    <div class="container">
        <h1>Calcular pedido</h1>
        <form action="calcular.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <input type="submit" value="Buscar" name="calcular">
        </form>
        <?php
        if (isset($_POST['calcular'])) {
            $nombre = trim(strip_tags($_POST['nombre']));
            $fichero = 'pedidos.txt';

            $precios = [
                'Iphone-11' => 1000,
                'Roomba' => 500,
                'Reloj' => 100
            ];

            if (file_exists($fichero)) {

                $archivo = fopen($fichero, 'r');

                $precioTotal = 0;
                $existeUsuario = false;

                while (($linea = fgets($archivo)) !== false) {
                    $linea1 = trim($linea);
                    $pedidos = explode(";", $linea1);

                    if (count($pedidos) === 5) {
                        [$nombrePedido, $direccion, $productos, $cantidad, $fecha] = $pedidos;

                        if ($nombre === $nombrePedido || $nombre === "") {
                            $existeUsuario = true;
                            $precioProducto = $precios[$productos] ?? 0;

                            $precioTotal += $precioProducto * (int)$cantidad;
                        }
                    }
                }
                fclose($archivo);

                if ($nombre === "") {
                    echo "<p>El precio total de todos los pedidos es: <strong>$precioTotal €</strong></p>";
                }elseif($existeUsuario){
                    echo "<p>El precio total del pedido de <strong>$nombre</strong> es: $precioTotal €</p>";
                }else{
                    echo "<p style ='color: red;'>Error. No se encuentra el usuario <strong>$nombre</strong></p>";
                }

            }else {
                echo "<p style='color: red;'>El archivo <strong>$fichero</strong> no existe.</p>";
            }
        }
        
    
        ?>
    </div>
</body>
</html>