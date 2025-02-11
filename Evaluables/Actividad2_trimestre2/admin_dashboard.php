
<?php
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$nombre = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

    <!-- Agrega Animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Menu administrador</title>
</head>
<body>
<main >
    <div class="container-fluid min-vh-100 d-flex flex-column">
    <div class="row">
        <!-- Sidebar / Menú -->
        <div class="col-2 sidebar  text-white vh-100 p-4">
            <h2 class="mt-5">Menú administrador</h2>
            <a href="index.php" class="btn menuA mb-2 text-white">Inicio</a>

            <div class="dropdown">
                <button class="btn btnIndex dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                    Usuarios
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="Usuarios-admin/altaUsuario.php">Alta</a></li>
                    <li><a class="dropdown-item" href="Usuarios-admin/bajaUsuario.php">Baja</a></li>
                    <li><a class="dropdown-item" href="Usuarios-admin/buscarUsuario.php">Buscar</a></li>
                    <li><a class="dropdown-item" href="Usuarios-admin/modificarUsuario1.php">Modificar</a></li>
                    <li><a class="dropdown-item" href="Usuarios-admin/listarUsuario.php">Listar</a></li>
                </ul>
            </div>

            <div class="dropdown mt-2">
                <button class="btn btnIndex dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                    Pisos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="Pisos-admin/altaPisos.php">Alta</a></li>
                    <li><a class="dropdown-item" href="Pisos-admin/bajaPisos.php">Baja</a></li>
                    <li><a class="dropdown-item" href="Pisos-admin/buscarPisos.php">Buscar</a></li>
                    <li><a class="dropdown-item" href="Pisos-admin/modificarPisos.php">Modificar</a></li>
                    <li><a class="dropdown-item" href="Pisos-admin/listarPisos.php">Listar</a></li>
                </ul>
            </div>

            <a href="cerrarSesion.php" class="btn btnIndex mt-3 text-white">Cerrar sesión</a>
        </div>

        <!-- Contenido principal -->
        <div class="col-10 d-flex flex-column flex-grow-1 align-items-center justify-content-center text-center">
            <h1 class="mb-4 fw-bold text-primary">Bienvenido, Administrador <?php echo $nombre ?></h1>

            <div class="row w-75 iconos">
                <!-- Tarjeta Usuarios -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 rounded-4 p-3 bg-primary text-white animate__animated animate__fadeIn">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h5 class="card-title" style="color:black;">Usuarios registrados</h5>
                            <p class="card-text display-4 fw-bold">120</p>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Pisos disponibles -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 rounded-4 p-3 bg-success text-white animate__animated animate__fadeIn animate__delay-1s">
                        <div class="card-body text-center">
                            <i class="fas fa-home fa-3x mb-3"></i>
                            <h5 class="card-title" style="color:black;">Pisos disponibles</h5>
                            <p class="card-text display-4 fw-bold">45</p>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta Pisos vendidos -->
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 rounded-4 p-3 bg-warning text-dark animate__animated animate__fadeIn animate__delay-2s">
                        <div class="card-body text-center">
                            <i class="fas fa-handshake fa-3x mb-3"></i>
                            <h5 class="card-title" style="color:black;">Pisos vendidos</h5>
                            <p class="card-text display-4 fw-bold">30</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de acceso rápido -->
            <div class="mt-4">
                <a href="Usuarios-admin/listarUsuario.php" class="btn btnIndex mx-2 btn-lg">
                    <i class="fas fa-user-cog"></i> Ver Usuarios
                </a>
                <a href="Pisos-admin/listarPisos.php" class="btn btnIndex mx-2 btn-lg">
                    <i class="fas fa-building"></i> Ver Pisos
                </a>
            </div>
        </div>
    </div>

    </div>
    
</main>

</body>
</html>