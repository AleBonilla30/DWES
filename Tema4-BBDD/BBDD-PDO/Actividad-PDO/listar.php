<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Empleados</h1>
        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Salario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php"; 
                $stm = $pdo->query("SELECT * FROM empleados");
                while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                    <td>{$row[ 'id' ]}</td>
                    <td>{$row[ 'nombre']}</td>
                    <td>{$row['apellido']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['salario']}</td>
                    </tr>";
                }
                ?>
            </tbody>

        </table>
        <?php echo '<div class="alert alert-success" role="alert">
                <a href="index.php" class="alert-link">Volver al menú</a>.
                </div>';?>
    
    </div>
</body>
</html>