<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Producto encontrado</h1>
    <?php
        include "config.php";

            $id = mysqli_real_escape_string($conn, $_POST['id']);

            $sql = "SELECT * FROM productos WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                echo "<table class='table table-striped table bordered'>";
                echo "<thead class='table-success'> <tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr></thead>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['cantidad'] . "</td>";
                echo "<td>" . $row['precio'] . "</td>";
                echo "</tr>";
                }

                echo "</table></thead>";

                echo '<div class="alert alert-success" role="alert">
                        Producto encontrado!
                    </div>';
            }else {
                echo '<div class="alert alert-warning" role="alert">
                    Producto no encontrado en la base de datos!
                </div>';
            }
            mysqli_close($conn);

    

        ?>


</div>


</body>
</html>