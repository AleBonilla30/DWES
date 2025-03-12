<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <?php
    require "config.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_REQUEST['id'];
            $nombre = $_REQUEST['nombre'] ;
            $apellido = $_REQUEST['apellido'];
            $email = $_REQUEST['email'];
            $salario = $_REQUEST['salario'];

            try {
                //query
                $sqlModificar ="UPDATE empleados SET nombre = :nombre, apellido = :apellido, email = :email, salario = :salario WHERE id = :id";
                $stm = $pdo->prepare($sqlModificar);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stm->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $stm->bindParam(':email', $email, PDO::PARAM_STR);
                $stm->bindParam(':salario', $salario, PDO::PARAM_INT);
                $stm->execute();

                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Empleado modificado correctamente correctamente!</strong> .
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }
        ?>
        <div class="alert alert-success" role="alert">
        Volver<a href="index.php" class="alert-link"> al menú </a>de inicio.
        </div>
    </div>
</body>
</html>
