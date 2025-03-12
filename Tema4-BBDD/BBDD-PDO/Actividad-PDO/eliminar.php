<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Empleado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-form">
        <h1>Eliminar Empleado</h1>
        <form action="eliminar.php" method="post">
            <input type="number" name="id" placeholder="Introduce un ID" class="form-control">
            <button class="btn btnGuardar w-100 mt-3" name="eliminar">Eliminar Empleado</button>
        </form>

        <?php
        require "config.php";

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_REQUEST['id'];
            $sqlCheck = "SELECT * FROM empleados WHERE id = :id";
            $stm = $pdo->prepare($sqlCheck);
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->execute();

            $empleado = $stm->fetch(PDO::FETCH_ASSOC);

            if ($empleado) {//se elimina si existe empleado
                $sql = "DELETE FROM empleados WHERE id = :id";
                $stm = $pdo->prepare($sql);
                $stm->bindPraram(':id', $id, PDO::PARAM_INT);
                $stm->execute();

                echo '<div class="alert alert-success" role="alert">
                Empleado eliminado correctamente!
                </div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">
                No se encontro empleado con ese ID.
                </div>';
            }
        }
        ?>
        <div class="alert alert-success" role="alert">
                <a href="index.php" class="alert-link">Volver al menú</a>.
        </div>
    </div>
</body>
</html>