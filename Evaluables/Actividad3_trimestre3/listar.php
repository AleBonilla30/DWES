<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="utils/css/style.css">
    <title>Listar evento</title>
</head>

<body>
    <main>
        <div class="container-dashboard animate__animated animate__fadeInDown">
            <h1 class="text text-center mb-3"><i class="fa-solid fa-list-check"></i> Lista de Eventos</h1>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover " style="max-width: 100%; overflow-x:auto;">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Lugar</th>
                            <th>Capacidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './config/conexion.php';

                        $query = "SELECT * FROM eventos";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['nombre']}</td>";
                            echo "<td>{$row['fecha']}</td>";
                            echo "<td>{$row['descripcion']}</td>";
                            echo "<td>{$row['lugar']}</td>";
                            echo "<td>{$row['capacidad']}</td>";
                            echo "</tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>

            </div>

            <div class="text-center mt-4">
                <a href="dashboard.php" class="link-light link-underline-opacity-0 fs-5"><i class="fas fa-arrow-left me-1"></i>Volver al menú</a>
            </div>
        </div>
    </main>
</body>

</html>