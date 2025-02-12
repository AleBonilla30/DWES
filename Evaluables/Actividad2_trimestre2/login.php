<?php
session_start();

                    
include 'config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = mysqli_real_escape_string($conn,$_POST['correo']);
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);


    //consulta para tener el usuario y su rol

    $sql = "SELECT usuario.usuario_id, usuario.nombres, usuario.clave, roles.nombre AS rol FROM usuario
            INNER JOIN roles ON usuario.rol_id = roles.id
            WHERE correo = '$correo'";
    $result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn)); // Mostrar error si la consulta falla
}

if (mysqli_num_rows($result) > 0) {

    while ($usuario = mysqli_fetch_assoc($result)) {
         //verificar la constraseña

        if (password_verify($pass, $usuario['clave'])) {
            $_SESSION['usuario'] = $usuario['nombres'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['usuario_id'] = $usuario['usuario_id'];
            $_SESSION['star'] = time();
            $_SESSION['expire'] = $usuario['start'] + (10 * 60);

            //redirigir a los usuarios
            if ($usuario['rol'] == 'administrador') {
                header('Location: admin_dashboard.php');
                exit();
            }elseif ($usuario['rol'] == 'vendedor') {
                header('Location: vendedor_dashboard.php');
                exit();
            }else {
                header('Location: comprador_dashboard.php');
                exit();
            }

            exit();

            }else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Contraseña incorrecta
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }                
        }
        
    }elseif ($correo == '' && $pass == '') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Por favor introduce todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else {
        echo "<div class='alert alert-danger alert-dismissible fade show animate__animated animate__fadeInDown' role='alert'>El correo no existe en la base de datos
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Inicio de sesión</title>
</head>
<body>
    <main class="container-fluid mt-2">
        <nav class="navbar navbar-expand-lg" style="background-color: #f3efdf ">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold navGenerico" href="index.php">AleBo inmobiliaria</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav  m-auto mb-2 mb-lg-0">
                        <li class="nav-item navGenerico">
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item navGenerico">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                        <li class="nav-item dropdown navGenerico">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Desliza
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item navGenerico" href="register.php">Registro</a></li>
                            <li><a class="dropdown-item navGenerico" href="login.php">Iniciar sesión</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item navGenerico" href="listaPiso.php">Listar pisos</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="consultar piso" aria-label="Search">
                        <button class="btn btnIndex" type="submit" name='buscar'>Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="login-container mt-5">

            <div class="login-card animate__animated animate__fadeInDown">
            <h1 class="text-center">Iniciar sesión</h1>
            
            <form action="login.php" method="post">
            
            <div class="mb-3 row">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" name="correo">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">contraseña:</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn w-100 btnIndex mb-2">Iniciar sesión</button>
            </form>
            </div>
            
        </div>
    </main>

    <footer class="bg-dark text-light py-4 mt-5">
            <div class="container">
                <div class="row">
                <!-- Sección de contacto -->
                    <div class="col-md-4">
                        <h5>Contacto</h5>
                        <p><i class="fas fa-map-marker-alt"></i> Calle madrid 123, Madrid</p>
                        <p><i class="fas fa-phone"></i> +34 123 456 789</p>
                        <p><i class="fas fa-envelope"></i> contacto@aleboinmobiliaria.com</p>
                    </div>

                    <!-- Sección de enlaces -->
                    <div class="col-md-4">
                        <h5>Enlaces Rápidos</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="text-light text-decoration-none">Inicio</a></li>
                            <li><a href="list.php" class="text-light text-decoration-none">Ver Propiedades</a></li>
                            <li><a href="register.php" class="text-light text-decoration-none">Registro</a></li>
                            <li><a href="login.php" class="text-light text-decoration-none">Iniciar Sesión</a></li>
                        </ul>
                    </div>

                    <!-- Sección de redes sociales -->
                    <div class="col-md-4">
                        <h5>Síguenos</h5>
                        <a href="#" class="text-light me-2"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-instagram fa-2x"></i></a>
                    </div>
                </div>

                <hr class="bg-light">

                <div class="text-center">
                    <p class="mb-0">© 2025 AleBo Inmobiliaria. Todos los derechos reservados.</p>
                </div>
            </div>
    </footer>
</body>
</html>