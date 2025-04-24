<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$nombre = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="utils/css/style.css">
    <title>Login</title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand p-2 p-md-3" href="index.php">Gestor de eventos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cerrarSesion.php">Cerrar sesión</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="container-dashboard ">
            <div class="dashboard-intro">
                <h1 class="fw-bold">¡Hola, <?php echo $nombre ?>! 👋</h1>
                <p class="mx-auto">
                    Bienvenido al gestor de eventos. Aquí podrás añadir, listar, modificar o eliminar los eventos según tus necesidades.
                    ¡Explora las opciones disponibles y mantén todo bajo control!
                </p>
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
    </main>

    <footer class=" text-light py-4 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Sección de redes sociales alineada a la izquierda -->
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <h5>Síguenos</h5>
                    <a href="#" class="text-light me-2"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-instagram fa-2x"></i></a>
                </div>

                <!-- Sección de derechos de autor alineada a la derecha -->
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">© 2025 AleBonilla. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>



</body>

</html>