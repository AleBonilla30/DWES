<?php
session_start();
include 'config/conexion.php';
if (!isset($_SESSION['usuario_id'])) {
        header('Location: login.php');
        exit();
    }

echo '<div class="alert alert-success">Sesión iniciada correctamente. Usuario: ' . $_SESSION['usuario'] . '</div>';
$sql = "SELECT codigo_piso, calle, numero, precio, imagen, metros, vendido FROM pisos /* WHERE vendido = 0 */";
$result = mysqli_query($conn, $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comprar'])) {

    
    $usuario_id = $_SESSION['usuario_id'];
    $codigo_piso = $_POST['codigo_piso'];
    $precio = $_POST['precio'];

    $sqlComprar = "INSERT INTO comprados (usuario_comprador, codigo_piso, precio_final) VALUES ('$usuario_id', '$codigo_piso', '$precio')";
    if (mysqli_query($conn, $sqlComprar)) {
        //actualizar el estado del piso a vendido

        $sqlActualizar = "UPDATE pisos SET vendido = 1  WHERE codigo_piso = '$codigo_piso'";
        mysqli_query($conn, $sqlActualizar);

        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        Inmueble comprado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        Error al comprar el inmueble.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Comprador</title>
</head>
<body>

<main class="container mt-4">
<nav class="navbar navbar-expand-lg" style="background-color: #f3efdf ">
            <div class="container-fluid">
                    <a class="navbar-brand fw-bold navGenerico" href="index.php">AleBo inmobiliaria</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                            <li class="nav-item navGenerico">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item navGenerico">
                                <a class="nav-link" href="cerrarSesion.php">Cierra sesión</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>
    <div class="row">
        <h1 class="mt-2 mb-3 text-center">Pisos & chalets en venta</h1>
        <?php while ($piso = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-3 mb-2"> <!-- Separa las tarjetas en columnas -->
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $piso['imagen']; ?>" alt="Imagen del piso" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Piso disponible</h5> -->
                        <h3><?php echo $piso['calle'] . " Nº" . $piso['numero']; ?></h3>
                        <p class="card-text">Precio: <?php echo number_format($piso['precio'], 3); ?>€</p>
                        <p class="card-text">Metros cuadrados: <?php echo number_format($piso['metros'], 2); ?> m²</p>

                        <form method="post" action="comprador_dashboard.php">
                            <input type="hidden" name="codigo_piso" value="<?php echo $piso['codigo_piso'] ?>">
                            <input type="hidden" name="precio" value="<?php echo $piso['precio'] ?>">

                            <?php if ($piso['vendido'] == 1):  ?>
                                <button class="btn btn-secondary" disabled>Vendido</button>
                            
                            <?php else: ?>
                            <button type="submit" class="btn btn-primary" name="comprar">Comprar</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php } mysqli_close($conn) ?>

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