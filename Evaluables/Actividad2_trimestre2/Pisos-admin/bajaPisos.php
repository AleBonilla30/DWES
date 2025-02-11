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

    <title>Baja Inmueble</title>
</head>
<body>

<main class="container-fluid mt-2">
    <div class="container mt-5  register-card mt-5 animate__animated animate__fadeInDown" style="max-width: 500px;">
    <h1 class="text-center m-5">Baja inmueble</h1>

    <form action="bajaPisos.php" method="post">
        <div class="row justify-content-center mt-4">
            <div class="col">

                <div class="mb-3">
                    <label for="id" class="form-label">ID inmueble:</label>
                    <input type="number" class="form-control" name="id">
                </div>
                <div class="mb-3 d-grid gap-2">

                    <button type="submit" class="btn btnIndex">Borrar inmueble</button>
                </div>
        
            </div>
        </div>
        
        <a href="../admin_dashboard.php"  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Volver al menú</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        if (isset($_POST['id'])) {

            $id =  mysqli_real_escape_string($conn, $_POST['id']);

        
            // Verificar si el piso con ese ID existe
            $checkSql = "SELECT * FROM pisos WHERE codigo_piso = $id";
            $checkResult = mysqli_query($conn, $checkSql);
            if (mysqli_num_rows($checkResult) > 0) {
                $sql = "DELETE FROM pisos WHERE codigo_piso = $id";
                if (mysqli_query($conn, $sql)) {
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            Inmueble eliminado correctamente.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            Error al eliminar el inmueble.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        No se ha encontrado el inmueble con ese ID en la base de datos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            
                }

        } else {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                Por favor, proporciona un ID para eliminar el inmueble.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    mysqli_close($conn);

?>


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