<?php
session_start();
include '../config/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $checkSql = "SELECT calle, numero, precio, imagen, metros FROM pisos WHERE codigo_piso = $id";
    $checkResult = mysqli_query($conn, $checkSql);

}else {
    echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    Ese inmueble no se encuentra en la Base de datos.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Buscar Inmueble</title>
</head>
<body>
    <main class="container-fluid mt-5">
        <div class="container">
            <div class="alert alert-light text-center" role="alert">

            <h2 class="text-primary">Usuario Inmueble</h2>
            <p class="lead">Aquí puedes ver inmuebles registrados.</p>
            </div>


            <div class="row">
                <h1 class="mt-2 mb-3 text-center">Pisos & chalets en venta</h1>
                <?php while ($piso = mysqli_fetch_assoc($checkResult)) { ?>
                <div class="col-md-3 mb-2 align-items-center"> <!-- Separa las tarjetas en columnas -->
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo '../'.$piso['imagen']; ?>" alt="Imagen del piso" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Piso disponible</h5>
                            <h3><?php echo $piso['calle'] . " Nº" . $piso['numero']; ?></h3>
                            <p class="card-text">Precio: <?php echo number_format($piso['precio'], 3); ?>€</p>
                            <p class="card-text">Metros cuadrados: <?php echo number_format($piso['metros'], 2); ?> m²</p>
                            <a href="#" class="btn btn-primary" name="comprar">Comprar</a>
                        </div>
                    </div>
                </div>
                <?php } mysqli_close($conn) ?>
            </div>

            <a href="../admin_dashboard.php"  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Volver al menú</a>

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