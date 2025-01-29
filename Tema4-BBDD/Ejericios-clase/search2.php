<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la busqueda</title>
</head>
<body>
    <h1>Resultado de la busqueda</h1>

    <?php
    $conexion = mysqli_connect('localhost', 'root', '', 'tiendaSERV');

    if (!$conexion) {
        die('Conexion fallida: ' . mysqli_connect_error());
    }

    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $sql = "SELECT id, nombre FROM productos WHERE nombre LIKE '%$nombre%'";

    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>ID: " . $row['id'] . "-Nombre: " . $row['nombre'] . "</li>";
        }
        echo "</ul>";
    }else {
        echo "<p style='color: red;'>No se ha encontrado el producto</p>";
    }
    mysqli_close($conexion)
    ?>
    <a href="index.php">Volver al menú</a>
</body>
</html>