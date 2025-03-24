<?php
// buscar_productos.php
include 'conexion.php';

$resultados = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = mysqli_real_escape_string($conexion, $_POST['termino']);
    
    // Consulta SQL directa (sin prepared statements)
    $sql = "SELECT * FROM productos 
            WHERE nombre LIKE '%$termino%' 
            OR id = '$termino'";
    
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
        while($fila = mysqli_fetch_assoc($resultado)) {
            $resultados[] = $fila;
        }
        mysqli_free_result($resultado);
    }
}
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscador de Productos</title>
    <style>
        table { border-collapse: collapse; margin: 20px 0; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        input[type="text"] { padding: 8px; width: 300px; }
        button { padding: 8px 16px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Buscador de Productos</h1>
    
    <form method="POST">
        <input type="text" name="termino" 
               placeholder="Ingrese ID o nombre del producto" 
               required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($resultados)): ?>
        <h2>Resultados de la búsqueda:</h2>
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
        <p>No se encontraron productos coincidentes</p>
    <?php endif; ?>
    
    <p><a href="index.php">Volver al menú principal</a></p>
</body>
</html>
