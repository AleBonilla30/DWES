<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Listar Estudiante</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de estudiantes</h1>
        <?php
        $fichero = 'notas.txt';

        $archivo = fopen($fichero, 'r');

        echo '<table class="table table-striped table-bordered mt-4">';
        echo '<thead class="table-dark">';
        echo '<tr>';
        echo '<th>Nombre</th>';
        echo '<th>Nota</th>';
        echo '</tr>';
        echo '</thead>';
        while (($linea = fgets($archivo)) !== false) {
            $lineas = explode(':', $linea);

            $nombre = $lineas[0];
            $notas = $lineas[1];

            echo '<tbody>';
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$notas</td>";
            echo "</tr>";
            echo '</tbody>';
        }
        echo '</table>';
        ?>

        <div class="mt-4">
            <a href="index.php" style="text-decoration: none;">Volver al menu</a>
        </div>
    </div>
</body>
</html>