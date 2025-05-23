<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Buscar alumno</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Buscar Alumno</h1>
        <form action="" method="post">
            <label for="nombre" class="form-label">Introduce nombre</label>
            <input type="text" class="form-control" name="nombre">
            <input type="submit" class="btn btn-outline-primary mt-3" name="buscar" value="Buscar">
        </form>

        <?php
        if (isset($_REQUEST['buscar'])) {
            $nombre = trim(strip_tags($_REQUEST['nombre']));
            $fichero = 'notas.txt';
            $archivo = fopen($fichero, 'r');
            if (file_exists($fichero)) {

                $archivo = fopen($fichero, 'r');
                $encontrado = false;

                while (($linea = fgets($archivo)) !== false) {
                    $alumno = explode(':', $linea);

                    if (count($alumno) >= 2 && $alumno[0] === $nombre) {
                        $encontrado = true;

                        $nombre = $alumno[0];
                        $notas = $alumno[1];

                        echo '<h1 class="mt-5"><strong>Alumno encontrado</strong></h1>';
                        echo '<table class="table table-striped table-bordered mt-4">';
                        echo '<thead class="table-dark">';
                        echo '<tr>';
                        echo '<th>Nombre</th>';
                        echo '<th>Nota</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        echo "<tr>";
                        echo "<td>$nombre</td>";
                        echo "<td>$notas</td>";
                        echo "</tr>";
                        echo '</tbody>';
                        echo '</table>';
                    }
                }
                fclose($archivo);
                if (!$encontrado) {
                    echo '<div class="alert alert-danger mt-4" role="alert">Alumno no encontrado.</div>';
                }
            } else {
                echo'<div class="alert alert-warning" role="alert mt-5">
                    El fichero no existe
                    </div>' ;
            }
            
            

        }
        ?>

        <div class="mt-4">
            <a href="index.php" style="text-decoration: none;">Volver al menu</a>
        </div>
    </div>
</body>
</html>