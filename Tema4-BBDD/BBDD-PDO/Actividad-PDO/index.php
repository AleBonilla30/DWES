<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Empleados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Ale Bonilla</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div>
        <h1 class="mt-5">Gestion de Empleados</h1>
        <div class="card-container">
            <div class="card" onclick="location.href='config.php';">
            <i class="fa-solid fa-database"></i>
                <p>Crear DB</p>
            </div>
        <div class="card-container">
            <div class="card" onclick="location.href='insertar.php';">
                <i class="fas fa-user-plus"></i>
                <p>Añadir</p>
            </div>
            <div class="card" onclick="location.href='listar.php';">
                <i class="fas fa-list"></i>
                <p>Listar</p>
            </div>
            <div class="card" onclick="location.href='modificar.php';">
                <i class="fas fa-edit"></i>
                <p>Modificar</p>
            </div>
            <div class="card" onclick="location.href='buscar.php';">
            <i class="fa-solid fa-magnifying-glass"></i>
                <p>Buscar</p>
            </div>
            <div class="card" onclick="location.href='eliminar.php';">
                <i class="fas fa-trash"></i>
                <p>Eliminar</p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>