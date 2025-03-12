<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Insertar usuario</h1>
        
        <form action="insertar.php" method="post" class="form-control">
        <input class="form-control mt-2" type="text" name="nombre" placeholder="Introduce nombre">
        <input class="form-control mt-2 " type="text" name="apellido" placeholder="Introduce apellido" >
        <input class="form-control mt-2 " type="email" name="email" placeholder="Introduce email" >
        <input class="form-control mt-2" type="number" step="0.01" name="salario" placeholder="Introduce salario" >
        <button type="submit" class="btn btnGuardar mt-2">Guardar</button>
        </form>
        <div class="container">
        <?php
        require "config.php";

        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $email = $_REQUEST['email'];
            $salario = floatval($_REQUEST['salario']) ;

            try {
                $sql = "INSERT INTO empleados (nombre, apellido, email, salario) VALUES (:nombre, :apellido, :email, :salario)";
                $stm = $pdo->prepare($sql);
                $stm->bindParam(':nombre', $nombre);
                $stm->bindParam(':apellido', $apellido);
                $stm->bindParam(':email', $email);
                $stm->bindParam(':salario', $salario);

                $stm->execute();

                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Empleado agregado correctamente!</strong> .
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div> ";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error:</strong>.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div> ";
            }
            
        }
        echo '<div class="alert alert-success" role="alert">
        <a href="index.php" class="alert-link">Volver al menú</a>.
        </div>';

        ?>
        </div>
        
    </div>
</body>
</html>