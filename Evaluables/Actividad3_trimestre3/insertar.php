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
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="utils/css/style.css">
    <title>Insertar evento</title>
</head>
<body>
    <main>
    <div class="container-dashboard animate__animated animate__fadeInDown">
        <h1 class="text-center mb-4 fw-bold text-white"><i class="fas fa-calendar-plus me-2"></i>Insertar Evento</h1>
        
        <form action="insertar.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Evento</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required />
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="lugar" class="form-label">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" required />
            </div>
            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" min="0" required />
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btnGuardar"><i class="fas fa-plus-circle me-2"></i>Añadir Evento</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="dashboard.php" class="link-light link-underline-opacity-0 fs-5"><i class="fas fa-arrow-left me-1"></i>Volver al menú</a>
        </div>

        <?php
        require './config/conexion.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
            $fecha = $_POST['fecha'];
            $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
            $lugar = mysqli_real_escape_string($conn,$_POST['lugar']);
            $capacidad = $_POST['capacidad'];

            if ($nombre === '' && $fecha === ''&& $descripcion === '' && $lugar === '' && $capacidad === '') {
                echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        Por favor, introduce todos los campos para añadir un evento.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

                exit();
            }

            $sql = "INSERT INTO eventos (nombre, fecha, descripcion, lugar, capacidad) VALUES('$nombre', '$fecha', '$descripcion', '$lugar', '$capacidad')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="alert alert-success mt-4" role="alert">
                        Evento añadido correctamente. <a href="dashboard.php" class="alert-link">Volver al menú</a>
                    </div>';
            } else {
                echo "<div class='alert alert-danger mt-4' role='alert'>Error al registrar evento: " . mysqli_error($conn) . "</div>";
            }
        }
        mysqli_close($conn);
        ?>
    </div>
    </main>
    
</body>
</html>