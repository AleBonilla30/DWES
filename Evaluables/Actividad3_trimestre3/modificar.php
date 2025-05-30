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
    <title>Modificar evento</title>
</head>
<body>
    <main>
        <div class="container-dashboard animate__animated animate__fadeInDown">
        <h1 class="text text-center mb-3"><i class="fa-solid fa-pen-to-square"></i> Modificar eventos</h1>
        <form action="modificar2.php" method="post" class="form-control">
            <div class="mb-3">
                <label for="id" class="form-label">Introduce Id:</label>
                <input type="number" class="form-control" id="id" name="id" required />
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btnGuardar"><i class="fas fa-plus-circle me-2"></i>Modificar Evento</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="dashboard.php" class="link-light link-underline-opacity-0 fs-5"><i class="fas fa-arrow-left me-1"></i>Volver al menú</a>
        </div>
        </div>
    </main>
</body>
</html>