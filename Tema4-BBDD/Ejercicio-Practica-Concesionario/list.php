<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Listar Coches</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1>Lista de coches</h1>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'concesionario');

        if (!$conn) {
            die('Conexion fallida: ' . mysqli_connect_error());
        }

        $sql = "SELECT id, marca, modelo, anio FROM coches";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped table bordered'>";
            echo "<thead class='table-success'> <tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Año</th></tr></thead>";

            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['marca'] . "</td>";
                echo "<td>" . $row['modelo'] . "</td>";
                echo "<td>" . $row['anio'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody> </table>";
            echo "<div class='alert alert-success'>Los datos mostrados correctamenre </div>";

        }else{
            echo "<div class='alert alert-warning'>No hay datos disponibles.</div>";
        }
        mysqli_close($conn)
        ?>
        <a href="index.php" class="d-block mt-3 text-primary">Volver al menú</a>
    </div>
</body>
</html>