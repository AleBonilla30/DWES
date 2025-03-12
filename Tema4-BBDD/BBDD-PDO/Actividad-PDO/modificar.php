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
    <div class="container-form">
        <h1>Modificar Empleado</h1>
        <form action="modificar2.php" method="post" class="form-control">
            <input class="form-control" type="number" name="id" placeholder="Introduce el id">
            <button class="btn btnGuardar mt-3 w-100" name="Modificar">Modificar</button>
        </form>
        <div class="alert alert-success" role="alert">
        Volver<a href="index.php" class="alert-link"> al menú </a>de inicio.
        </div>
    </div>
</body>
</html>