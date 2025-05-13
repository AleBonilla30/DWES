<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Insertar Usuario</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Insertar usuario</h1>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" name="edad" required>
            </div>
            <div class="mb-3">
                
                <input type="submit" class="btn btn-success" name="insertar" value="Insertar usuario">
            </div>
        </form>

        <a href="index.php" class="mt-3 text-center" style="text-decoration: none; color:black;">Regresar al menú</a>


        <?php
        include 'config.php';

        if (isset($_REQUEST['insertar'])) {
            $nombre = trim(strip_tags($_REQUEST['nombre']));
            $apellido = trim(strip_tags($_REQUEST['apellido']));
            $email = trim(strip_tags($_REQUEST['email']));
            $edad = trim(strip_tags($_REQUEST['edad']));

            $sql = "INSERT INTO usuarios(nombre, apellido, email, edad) VALUE('$nombre', '$apellido', '$email', '$edad')";
            if (mysqli_query($conn, $sql)) {
                echo "<p style='color: green; font-size: 25px'>Usuario agregado correctamente. ✔</p>";
            }else {
                echo "<p style='color: red; font-size: 25px'>Error al insertar usuario. ❌</p>"  . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>

    </div>
</body>
</html>