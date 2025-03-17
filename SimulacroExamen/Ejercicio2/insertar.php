<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Insertar Usuarios</h1>

    <form action="insertar.php" method="post">

        <input type="text" class="form-control mt-3" placeholder="Ingresa el nombre" name="nombre" required>
        <input type="text" class="form-control mt-3" placeholder="Ingresa el apellido" name="apellido" required>
        <input type="text" class="form-control mt-3" placeholder="Ingresa el email" name="email" required>
        <input type="text" class="form-control mt-3" placeholder="Ingresa el edad" name="edad" required>

        <button class="btn btn-outline-success w-100 mt-3">Añadir usuario</button>
    </form>

    <?php
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = trim(strip_tags($_POST['nombre']));
        $apellido = trim(strip_tags($_POST['apellido']));
        $email = trim(strip_tags($_POST['email']));
        $edad = trim(strip_tags($_POST['edad']));

        $sql = "INSERT INTO usuarios (nombre, apellido, email, edad) VALUES ('$nombre', '$apellido', '$email', '$edad')";

        if (mysqli_query($conn, $sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Usuario agreado correctamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            No se ha podido agregar al usuario
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    }
    mysqli_close($conn);
    ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
    <div>
    <a href="index.php">Volver al menú de inicio</a>
    </div>
    </div>
</body>
</html>