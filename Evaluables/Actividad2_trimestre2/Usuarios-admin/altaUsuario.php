<?php
session_start();
include '../config/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Alta de usuario</title>
</head>
<body>
    <main class="container-fluid mt-2">

        <div class="register-container mt-5">
        <div class="register-card mt-5 animate__animated animate__fadeInDown">
        <h1 class="text-center ">Alta de usuario</h1>
            <form action="altaUsuario.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
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
                        <option value="2">Vendedor</option>
                    <option value="3">Comprador</option>
                    </select>
                <button type="submit" class="btn w-100 btnIndex mt-4">Alta de usuario</button>

                <a href="../admin_dashboard.php"  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Volver al menú</a>
    
            </form>

            <div class="mb-4">
                <?php
                    include '../config/conexion.php'; // Conexión a la base de datos

                 //clave de usuario admin 12345
                // clave jorge 1234
                //clave alma 12345A
                //clave damaris 12345
                //clave jose 123456

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
                        $nombres = mysqli_real_escape_string($conn, trim($_POST['nombre']));
                        $correo = mysqli_real_escape_string($conn, trim($_POST['correo']));
                        $clave = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Encriptar contraseña
                        $rol_id = (int) $_POST['rol']; // Convertir a entero para evitar inyección SQL

                        // Consulta SQL corregida
                        $sql = "INSERT INTO usuario (nombres, correo, clave, rol_id) VALUES ('$nombres', '$correo', '$clave', $rol_id)";

                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success" role="alert">
                            Registro exitoso. Ahora puedes <a href="../login.php">Iniciar sesión</a>
                            </div>';
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Error al registrarse: " . mysqli_error($conn) . "</div>";
                        }
                    }
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