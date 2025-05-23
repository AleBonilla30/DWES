<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Agregar Alumno</title>
</head>
<body>
    <div class="div container mt-3">
        <h1>Agregar Estudiante</h1>
        <form action="#" method="post" class="mt-3">
            <label for="nombre" class="form-label">Nombre Estudiante</label>
            <input type="text" name="nombre" class="form-control">
            <label for="nota" class="form-label">Nota estudiante</label>
            <input type="number" name="nota" class="form-control">
            <input type="submit" name="agregar" value="Agregar estudiante" class="btn btn-outline-primary mt-3">
        </form>
        <div class="mt-4">
            <a href="index.php" style="text-decoration: none;">Volver al menu</a>
        </div>

        <?php

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if (isset($_REQUEST['agregar'])) {
                $nombre = trim(strip_tags($_REQUEST['nombre']));
                $nota = trim(strip_tags($_REQUEST['nota']));
                $fichero = 'notas.txt';

                if (file_exists($fichero)) {
                    $escribir = implode(':', [$nombre, $nota]);

                    $archivo = fopen($fichero, 'a');

                    fputs($archivo, $escribir .PHP_EOL);
                    
                    echo '<div class="alert alert-success" role="alert mt-5">
                    Alumno agregado correctamente.
                    </div>';
                    fclose($archivo);
                } else {

                    echo'<div class="alert alert-warning" role="alert mt-5">
                            El fichero no existe
                            </div>' ;
                }


            }
        }


        ?>  
    </div>
</body>
</html>