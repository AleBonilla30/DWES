<?php
session_start();
include 'config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

echo '<div class="alert alert-success">Sesión iniciada correctamente. Usuario: ' . $_SESSION['usuario'] . '</div>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $calle = mysqli_real_escape_string($conn, $_POST['calle']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $piso = mysqli_real_escape_string($conn, $_POST['piso']);
    $puerta = mysqli_real_escape_string($conn, $_POST['puerta']);
    $cp = mysqli_real_escape_string($conn, $_POST['cp']);
    $metros = mysqli_real_escape_string($conn, $_POST['metros']);
    $zona = mysqli_real_escape_string($conn, $_POST['zona']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $usuario_id = $_SESSION['usuario_id']; // Usamos el id del usuario que está registrado
    $vendido = 0; // Inicialmente no está vendido
    
    $directorioDestino = 'uploads/';
    if (!file_exists($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);
    }

// Procesar la imagen

    $nombreArchivo = $_FILES['imagen_subida']['name'];
    $rutaTemporal = $_FILES['imagen_subida']['tmp_name'];
    $rutaDestino = 'uploads/' . uniqid() . '_' .basename($nombreArchivo); // Nombre único para evitar duplicados

    // Mover la imagen a la carpeta
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        $imagen = $rutaDestino;
        $sql = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id, vendido)
        VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$zona', '$precio', '$imagen', '$usuario_id', '$vendido')";

        if (mysqli_query($conn, $sql)) {
            echo '<div class="alert alert-success">Piso registrado exitosamente</div>';
        }else {
            echo '<div class="alert alert-danger">Error al registrar el piso:'. mysqli_error($conn). '</div>';
        }
        
    } else {
        echo '<div class="alert alert-danger">Error al mover la imagen</div>';
        exit();
    }
} 
mysqli_close($conn);
    

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Vendedor</title>
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
        <div class="container d-flex justify-content-center">
        <div class="contenedorVendedor mt-3">
                    <div class="titulo">
                        <h2 class="text-center mb-3">Registrar Piso</h2>

                    </div>
                    <form action="vendedor_dashboard.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="calle" name="calle" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número</label>
                            <input type="number" class="form-control" id="numero" name="numero" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="piso" class="form-label">Piso</label>
                            <input type="text" class="form-control" id="piso" name="piso" required>
                        </div>

                        <div class="mb-3">
                            <label for="puerta" class="form-label">Puerta</label>
                            <input type="text" class="form-control" id="puerta" name="puerta" required>
                        </div>

                        <div class="mb-3">
                            <label for="cp" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="cp" name="cp" required>
                        </div>

                        <div class="mb-3">
                            <label for="metros" class="form-label">Metros Cuadrados</label>
                            <input type="number" class="form-control" id="metros" name="metros" required>
                        </div>

                        <div class="mb-3">
                            <label for="zona" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zona" name="zona" required>
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" required>
                        </div>

                        <div class="mb-3">
                            <label for="imagen_subida" class="form-label">Imagen (Subir Imagen)</label>
                            <input type="file" class="form-control mt-2" id="imagen_subida" name="imagen_subida">
                        </div>
                        <button type="submit" class="btn btnIndex w-100">Registrar Piso</button>
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