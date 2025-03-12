<?php
require "config.php";
$idUsuario = $_REQUEST['id'];

$sql = "SELECT * FROM empleados WHERE ID = :id";
$stm = $pdo->prepare($sql);
$stm->bindParam(':id', $idUsuario, PDO::PARAM_INT);
$stm->execute();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-form">
        <h1 class="text-center">Modificación de usuario</h1>
        <form action="modificar3.php" method="post" class="form-control">
            <?php
            while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input type="number" name="id" class="form-control" value="<?php echo $row['id']?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">apellido:</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido']?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>">
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salario:</label>
                <input type="number" name="salario" class="form-control" value="<?php echo $row['salario']?>">
            </div>
            <button type="submit" class="btn w-100 btnGuardar mt-3" name="modificar">Modificar</button>
            <?php }?>
        </form>

        <div class="alert alert-success" role="alert">
        Volver<a href="index.php" class="alert-link"> al menú </a>de inicio.
        </div>

    </div>
</body>
</html>