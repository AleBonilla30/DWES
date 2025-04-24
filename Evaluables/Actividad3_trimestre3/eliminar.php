
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
    <title>Eliminar Evento</title>
</head>
<body>
    <main>
        <div class="container-dashboard animate__animated animate__fadeInDown">
        <h1 class="text text-center mb-3"><i class="fa-solid fa-trash-arrow-up"></i> Eliminar evento</h1>
        <form action="#" method="post" class="form-control">
            <div class="mb-3">
                <label for="identidicador" class="form-label">ID o Nombre del Evento:</label>
                <input type="text" class="form-control" id="identificador" name="identificador" required />
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btnGuardar"><i class="fas fa-plus-circle me-2"></i>Eliminar Evento</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="dashboard.php" class="link-light link-underline-opacity-0 fs-5"><i class="fas fa-arrow-left me-1"></i>Volver al menú</a>
        </div>

        <?php
        require'./config/conexion.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['identificador'])) {
                $identificador = mysqli_real_escape_string($conn, $_POST['identificador']);

                if ($identificador === '') {
                    echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        Por favor, introduce un ID o nombre.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        exit();
                }

                if (is_numeric($identificador)) {
                    $query = "DELETE FROM eventos WHERE id = ?";
                    $stm = mysqli_prepare($conn,$query);
                    mysqli_stmt_bind_param($stm, 'i', $identificador); //se dice el tipo de dato 's'->string, 'i'->integer, 'd'->double,
                }else{
                    $query = "DELETE FROM eventos WHERE nombre = ?";
                    $stm = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stm, 's', $identificador);
                }

                if (mysqli_stmt_execute($stm)) {
                    if (mysqli_stmt_affected_rows($stm) > 0) {
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        Evento eliminado correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }else{
                        echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        No se encontro ningun evento con ese ID o nombre.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }else {
                    echo 'Error al ejecutar la consulta: ' . mysqli_stmt_error($stm);
                }

                mysqli_stmt_close($stm);
                mysqli_close($conn);

            }
        }

        ?>
        </div>
    </main>
</body>
</html>