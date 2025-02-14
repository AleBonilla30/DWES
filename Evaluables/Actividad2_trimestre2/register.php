<?php
include 'config/conexion.php';

$sql = "SELECT * FROM roles";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Registro de usuario</title>
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
                            <li><a class="dropdown-item navGenerico" href="list.php">Listar pisos</a></li>
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

        <div class="register-container mt-5">
        <div class="register-card mt-5 animate__animated animate__fadeInDown">
            <h1 class="text-center ">Registro de usuario</h1>
            <form action="register.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
            
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" name="correo">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">contraseña:</label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <label for="rol">Selecciona tu rol</label>
                    <select name="rol" class="form-select" required>
                        <?php

                        $sql = "SELECT * FROM roles";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                        }
                        
                        ?>
                    </select>
                <button type="submit" class="btn w-100 btnIndex mt-5">Registrarse</button>
    
            </form>

            <div class="mb-4">
                <?php

                 //clave de usuario admin 12345
                // clave jorge 123456
                //clave alma 123456A
                //clave damaris 12345

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
                        $nombres = mysqli_real_escape_string($conn, trim($_POST['nombre']));
                        $correo = mysqli_real_escape_string($conn, trim($_POST['correo']));
                        $clave = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Encriptar contraseña
                        $rol_id = (int) $_POST['rol']; // Convertir a entero para evitar inyección SQL

                        // Consulta SQL 
                        $sql = "INSERT INTO usuario (nombres, correo, clave, rol_id) VALUES ('$nombres', '$correo', '$clave', $rol_id)";

                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success" role="alert mt-2">
                            Registro exitoso. Ahora puedes <a href="login.php">Iniciar sesión</a>
                            </div>';
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Error al registrarse: " . mysqli_error($conn) . "</div>";
                        }
                    }
                    mysqli_close($conn);
                    ?>

                </div>
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