<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Agregar coche</title>
</head>
<body class="bg-light">
    <div class="container alert alert-success p-4 shadow-lg rounded mt-5">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'concesionario');

        if (!$conn) {
            die('Conexión fallida.' . mysqli_affected_rows());
        }
        
        $marca = mysqli_real_escape_string($conn, $_POST['marca']);
        $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
        $anio = mysqli_real_escape_string($conn, $_POST['anio']);
        $sql = "INSERT INTO coches (marca, modelo, anio) VALUES ('$marca', '$modelo', '$anio')";

        if (mysqli_query($conn, $sql)) {
            echo "<p style='color: green; font-size: 25px'>Producto agregado correctamente. ✔</p>";
        }else {
            echo "<p style='color: red; font-size: 25px'>Error:" . $sql . "<br>" . mysqli_error($conn);;
        }

        mysqli_close($conn)

        ?>
    <a href="index.php">Volver al menú</a>
    </div>
    
</body>
</html>