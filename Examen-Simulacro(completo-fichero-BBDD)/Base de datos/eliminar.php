<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Eliminar</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Elimiar un usuario</h1>

        <form method="post" class="mb-4">
        <label for="id" class="form-label">ID del usuario a eliminar</label>
        <input type="number" name="id" class="form-control" required>
        <input type="submit" name="eliminar" value="Eliminar" class="btn btn-outline-danger mt-2">
    </form>

    <?php
    include 'config/conffig.php';

    if (isset($_POST['eliminar'])) {
        $id = (int) $_POST['id'];

        $check = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");

        if (mysqli_num_rows($check) > 0) {
            $sql = "DELETE FROM usuarios WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>Usuario con ID $id eliminado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al eliminar: " . mysqli_error($conn) . "</div>";
            }
            
        } else {
            echo "<div class='alert alert-warning'>No existe ningún usuario con el ID $id.</div>";
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