<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-form">
        <h1>Buscar Empleado</h1>
        <form action="buscar.php" method="post" class="form-control">
            <input class="form-control" type="number" name="id" placeholder="Buscar por id">
            <button class="btn btnGuardar mt-3 w-100" name="buscar">Buscar</button>
        </form>
        <?php
        require "config.php";

        if (isset($_REQUEST['buscar'])) {
            $id = $_POST['id'];
            try {
                $sql = "SELECT * FROM empleados WHERE id = :id";
                $stm = $pdo->prepare($sql);
                $stm->bindParam('id', $id, PDO::PARAM_INT);
                $stm->execute();
                echo '<table class="table mt-4">';
                echo '<thead class="table-dark">';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Apellido</th>';
                echo '<th>Email</th>';
                echo '<th>Salario</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["nombre"] . '</td>';
                    echo '<td>' . $row["apellido"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["salario"] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        ?>
    </div>
</body>
</html>