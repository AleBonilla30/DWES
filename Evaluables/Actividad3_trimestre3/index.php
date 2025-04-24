<?php
session_start();

$error = '';
$mensaje = '';

if (isset($_POST['login'])) {
    $usuario = trim(strip_tags($_POST['usuario']));
    $password = trim(strip_tags($_POST['pass']));

    $archivo = 'usuarios.txt';
    if (file_exists($archivo)) {
        $fichero = fopen($archivo, 'r');
        $estaUsuario = false;

        while (($linea = fgets($fichero)) !== false) {
            $line = trim($linea);
            $comprobar = explode(':', $line);

            if (count($comprobar) === 2) {
                $usuarioComprobado = $comprobar[0];
                $passwordComprobado = $comprobar[1];
            }

            if ($usuario === $usuarioComprobado && $password === $passwordComprobado) {
                $estaUsuario = true;
    
            }
        }

        fclose($fichero);

        if ($estaUsuario) {
            $_SESSION['usuario'] = $usuario;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Usuario no encontrado!</strong> introduce usuario valido o contraseña.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    }else{
        $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>El usuario no existe!</strong> en el archivo txt.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    }
}


//procesar el modal de registro

if (isset($_POST['register'])) {
    $userRegister = trim(strip_tags($_POST['usuarioRegister']));
    $passwordRegister = trim(strip_tags($_POST['passwordRegister']));

    $fichero = 'usuarios.txt';
    if (file_exists($fichero)) {
        $registro = implode(':', [$userRegister,$passwordRegister]);
        $archivo = fopen($fichero, 'a');

        fputs($archivo, $registro . PHP_EOL);
        fclose($archivo);

        $mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario registrado con exito.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="utils/css/style.css">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Gestion de eventos</title>
</head>

<body>
    <header>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand p-2 p-md-3" href="index.php">Gestor de eventos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Inicio de sesión</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    </header>
<main>
    <!-- Modal login -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Iniciar sesión</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                            <button type="submit" class="btn btn-outline-primary modalBtn mt-3" name="login">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary modalBtn" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>



    <!-- Modal register -->
    <div class="modal fade" id="modalRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalRegister">Registro de Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <label for="usuarioRegister" class="form-label">Introduce Usuario:</label>
                            <input type="text" class="form-control" id="usuarioRegister" name="usuarioRegister" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordRegister" class="form-label">Introduce contraseña:</label>
                            <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" required>
                            <button type="submit" class="btn btn-outline-primary modalBtn mt-3" name="register">Registrarse</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary modalBtn" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Slogan de pagina principal -->
    <div class="container mt-3 mt-md-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 order-lg-1 order-2 mt-3 mt-lg-0">
                <h1 class="slogan animate__animated animate__fadeInLeft mt-5">Organiza tus eventos con facilidad</h1>
                <p class="animate__animated animate__fadeInLeft mt-3">Gestiona tus eventos y reuniones desde un solo lugar. Rápido, intuitivo y seguro.</p>
                <button type="button" class="btn btn-outline-primary p-3 animate__animated animate__fadeInLeft mt-3" data-bs-toggle="modal" data-bs-target="#modalRegister">Comenzar ahora</button>
            </div>
            <div class="col-12 col-lg-6 order-lg-2 order-1 text-center">
                <img src="utils/img/ilustracion.png" class="img-fluid" alt="ilustracion de gestion de evetos" width="600px" height="700px">
            </div>
        </div>
        <?php if (!empty($error)) echo $error?>
        <?php if (!empty($mensaje)) echo $mensaje?>
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