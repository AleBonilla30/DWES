<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Listar Usuarios</h1>

        <?php
        include "config.php";

        $sql = "SELECT * FROM usuarios";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped table bordered'>";
        echo "<thead class='table-success'> <tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th></tr><th>Edad</th></thead>";

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
        echo "</tbody> </table>";
        echo "<div class='alert alert-success'>Los datos mostrados correctamenre </div>";
        }else {
            echo "<div class='alert alert-danger'>No se ha podido mostrar la lista de usuario</div>";
        }
        

        ?>

    </div>
</body>
</html>