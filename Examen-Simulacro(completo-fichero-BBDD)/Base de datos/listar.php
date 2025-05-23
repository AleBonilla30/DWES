<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Listar usuario</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de usuarios</h1>
        <?php
        include 'config/conffig.php';

        $sql = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conn, $sql);


        if (mysqli_num_rows($resultado) > 0) {

            echo '<table class="table table-striped table-bordered mt-4">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nombre</th>';
            echo '<th>Apellido</th>';
            echo '<th>Email</th>';
            echo '<th>Edad</th>';
            echo '</tr>';
            echo '</thead>';

            while ($row = mysqli_fetch_assoc($resultado)) {
                echo '<tbody>';
                echo "<tr>";
                echo "<td>". $row['id']."</td>";
                echo "<td>". $row['nombre']."</td>";
                echo "<td>". $row['apellido']."</td>";
                echo "<td>". $row['email']."</td>";
                echo "<td>". $row['edad']."</td>";
                echo "</tr>";
                echo '</tbody>';
            }
            
            echo "</tbody> </table>"; 
        }
        mysqli_close($conn);
        ?>

        <div class="bt-3">
            <a href="index.php">Volver al menu principal</a>
        </div>
    </div>
    
</body>
</html>