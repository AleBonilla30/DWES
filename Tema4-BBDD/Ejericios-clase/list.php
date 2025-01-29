<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar productos</title>
</head>
<body>
    <h1>Lista de productos</h1>
    <?php
    $conexion = mysqli_connect('localhost', 'root', '', 'tiendaSERV');

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT id, nombre FROM productos";
    $result = mysqli_query($conexion, $sql);
    
    //mysqli_num_rows = se utiliza para obtener el número total de filas devueltas por una consulta SELECT. Es útil cuando necesitas saber cuántos registros se han encontrado en la base de datos que coinciden con tu consulta.
    if (mysqli_num_rows($result) > 0) { 

        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) { //mysqli_fetch_assoc= se usa para recuperar una fila de un conjunto de resultados de una consulta SQL
            echo '<li>ID: ' . $row['id'] . '-Nombre: ' . $row['nombre'] . '</li>';
        }

        echo "</ul>";
    }else {
        echo "<p>No hay productos disponibles.</p>";
    }

    mysqli_close($conexion);

    ?>
    <a href="index.php">Volver al menú</a>
</body>
</html>