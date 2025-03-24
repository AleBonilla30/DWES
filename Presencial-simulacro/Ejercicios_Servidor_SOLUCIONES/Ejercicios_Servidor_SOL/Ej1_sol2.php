<?php
// Archivo: buscar_producto_fgets.php
$archivo = 'inventario.txt';

// Procesar búsqueda
$resultados = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = trim($_POST['termino']);
    
    $handle = fopen($archivo, 'r');
    if ($handle) {
        while (($linea = fgets($handle)) !== false) {
            $campos = explode(':', trim($linea));
            
            if (count($campos) >= 4) {
                if ($campos[0] == $termino || stripos($campos[1], $termino) !== false) {
                    $resultados[] = [
                        'id' => $campos[0],
                        'nombre' => $campos[1],
                        'cantidad' => $campos[2],
                        'precio' => $campos[3]
                    ];
                }
            }
        }
        fclose($handle);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscar Producto - Sistema de Inventario</title>
    <style>
        table { border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Buscar Producto</h1>
    <form method="POST">
        <input type="text" name="termino" placeholder="ID o nombre del producto" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($resultados)): ?>
        <h2>Resultados:</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($resultados as $producto): ?>
            <tr>
                <td><?= $producto['id'] ?></td>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                <td><?= $producto['cantidad'] ?></td>
                <td><?= number_format($producto['precio'], 2) ?>€</td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No se encontraron productos que coincidan con la búsqueda</p>
    <?php endif; ?>
    
    <p><a href="index.php">Volver al menú</a></p>
</body>
</html>
