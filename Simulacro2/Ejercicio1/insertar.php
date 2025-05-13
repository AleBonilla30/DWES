<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Insertar estudiante</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Insertar estudiante</h1>
        <form action="#" method="post">
            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <input type="number" name="nota" class="form-control">
        </div>
        <button class="btn btn-outline-success" name="insertar">Insertar Alumno</button>
        </form>
        <a href="index.php" class="mt-3">Volver al menú</a>

        <?php
    

            if (isset($_REQUEST['insertar'])) {
                $nombre = trim(strip_tags($_REQUEST['nombre']));
                $nota = trim(strip_tags($_REQUEST['nota']));
                $fichero = 'notas.txt';

                if (!file_exists($fichero)) {
                    die('El archivo no existe');
                }

                $escribir = implode(':',[ $nombre, $nota]);
                
                $archivo = fopen($fichero, 'a');
                fputs($archivo, $escribir . PHP_EOL);

                fclose($archivo);

                echo "<p>Usuario insertardo correctamente</p>";

            }

        
        ?>
    </div>
</body>
</html>