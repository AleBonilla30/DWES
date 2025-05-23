<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Modificar</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Modificar un usuario</h1>

        <form method="post" class="mb-4">
        <label for="id" class="form-label">ID del usuario a modificar</label>
        <input type="number" name="id" class="form-control" required>
        <input type="submit" name="buscar" value="Buscar" class="btn btn-outline-success mt-2">
    </form>

    <?php
    include 'config/conffig.php';

    if (isset($_POST['buscar'])) {
        $id = (int) $_POST['id'];

        $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");

        if ($row = mysqli_fetch_assoc($result)) {
            // Mostrar el formulario para editar
            ?>
            <form method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="mb-2">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?=($row['nombre']) ?>" required>
                </div>
                <div class="mb-2">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="<?= $row['apellido'] ?>" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
                </div>
                <div class="mb-2">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" name="edad" class="form-control" value="<?= $row['edad'] ?>" required>
                </div>
                <input type="submit" name="modificar" value="Modificar" class="btn btn-success">
            </form>
            <?php
        } else {
            echo "<div class='alert alert-warning'>Usuario no encontrado con ID $id.</div>";
        }
    }

    // Procesar la modificación
    if (isset($_POST['modificar'])) {
        $id = (int) $_POST['id'];
        $nombre = trim(strip_tags($_POST['nombre']));
        $apellido = trim(strip_tags($_POST['apellido'])) ;
        $email =  $_POST['email'];
        $edad = (int) $_POST['edad'];

        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', edad='$edad' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Usuario modificado correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al modificar: " . mysqli_error($conn) . "</div>";
        }
    }

    mysqli_close($conn);

    ?>

        <div class="mt-4">
            <a href="index.php" style="text-decoration: none;">Volver al menu</a>
        </div>
    </div>
</body>
</html>