<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <?php
    $conexion = mysqli_connect('localhost', 'root', '', 'tiendaSERV');

    if (!$conexion) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    $id = mysqli_real_escape_string($conexion, $_POST['id']);
    $sql = "DELETE FROM productos WHERE id = $id ";

    if (mysqli_query($conexion, $sql)){
        echo "<p>Producto eliminado correctamente.</p>";
    }else{
        echo "<p style='color: red;'>No se puede eliminar el producto por que no esta en la Base de datos</p>";
    }
    mysqli_close($conexion);
    ?>
    <a href="index.php">Volver al menú</a>
</body>
</html>