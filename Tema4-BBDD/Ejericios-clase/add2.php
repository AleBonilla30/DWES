<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
</head>
<body>
<?php
//abrimos la conexion
$conexion = mysqli_connect('localhost', 'root', '', 'tiendaSERV');

if (!$conexion) {
    die("Conexion Fallida: " . mysqli_connect_error());
}

$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']); //con esto nos aseguramos que no metan etiquetas o espacion en el input
$sql = "INSERT INTO productos (nombre) VALUES ('$nombre')";

if (mysqli_query($conexion,$sql)) {
    echo "<p style='color: green;'>Producto añadido correctamente ✔.</p>";
}else {
    echo "<p style='color: red;'>Error:" . $sql . "<br>" . mysqli_error($conexion); //para saber el error que hay
}

mysqli_close($conexion);

?>

<a href="index.php">Volver al menu principal</a>
</body>
</html>



