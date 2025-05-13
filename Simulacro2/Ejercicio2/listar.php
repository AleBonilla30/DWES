<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Listar Usuario</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de usuarios</h1>

        <?php
        include 'config.php';

        $sql = "SELECT * FROM usuarios";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)) {
            echo '<table class="table">';
            echo "<thead class='table-dark'> <tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Edad</th></tr></thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['edad'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo '</table>';
        }else {
            echo "<div class='alert alert-warning'>No hay datos disponibles.</div>";
        }
        mysqli_close($conn)
        ?>

        <a href="index.php" style="text-decoration: none; color: black;">Volver al menú</a>

    </div>
</body>
</html>