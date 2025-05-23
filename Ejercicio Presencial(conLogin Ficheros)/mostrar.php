<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todos los pedidos</h1>
        <?php
        $fichero = 'pedidos.txt';

        if (file_exists($fichero)) {
            $archivo = fopen($fichero, 'r');

            if ($archivo) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Dirección</th>";
                echo "<th>Pedido</th>";
                echo "<th>Cantidad</th>";
                echo "<th>Fecha de pedido</th>";
                echo "</tr>";

                while (($linea = fgets($archivo)) !== false) {
                    $pedidos = explode(';', trim($linea)); // Elimina espacios y saltos de línea

                    // Validar que la línea tiene exactamente 5 elementos
                    if (count($pedidos) === 5) {
                        [$nombre, $direccion, $pedidoSelect, $cantidad, $fecha] = $pedidos;

                        echo "<tr>";
                        echo "<td>$nombre</td>";
                        echo "<td>$direccion</td>";
                        echo "<td>$pedidoSelect</td>";
                        echo "<td>$cantidad</td>";
                        echo "<td>$fecha</td>";
                        echo "</tr>";
                    } 
                }
                echo "</table>";
                fclose($archivo);
            } else {
                echo "<p>Error: No se pudo abrir el archivo.</p>";
            }
        } else {
            echo "<p>Error: El archivo <strong>$fichero</strong> no existe.</p>";
        }
        ?>
    </div>
</body>
</html>