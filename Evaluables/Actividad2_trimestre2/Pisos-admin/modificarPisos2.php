<?php
session_start();
include '../config/conexion.php';
$id_pisos = $_POST['id'];
$sql = "SELECT codigo_piso, calle, numero, piso, puerta, cp, metros, zona, precio FROM pisos WHERE codigo_piso = '$id_pisos'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Inmuebles</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <main class="container-fluid">
        <div class="modify-container mt-5">
            <div class=" contenedorVendedor animate__animated animate__fadeInDown">
            <h1 class="text-center mb-3">Modificar inmueble</h1>
            <form action="modificarPisos3.php" method="post">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="mb-3">
                    <label for="id" class="form-label">ID del inmueble:</label>
                    <input type="number" class="form-control" name="id" value="<?php echo $row['codigo_piso'] ?>" readonly>
                </div>
                <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="calle" value="<?php echo $row['calle'] ?>" name="calle" >
                        </div>
        
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número</label>
                            <input type="number" class="form-control" id="numero" value="<?php echo $row['numero'] ?>" name="numero" >
                        </div>
        
                        <div class="mb-3">
                            <label for="piso" class="form-label">Piso</label>
                            <input type="text" class="form-control" id="piso" value="<?php echo $row['piso'] ?>" name="piso" >
                        </div>

                        <div class="mb-3">
                            <label for="puerta" class="form-label">Puerta</label>
                            <input type="text" class="form-control" id="puerta" value="<?php echo $row['puerta'] ?>" name="puerta">
                        </div>

                        <div class="mb-3">
                            <label for="cp" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="cp" value="<?php echo $row['cp'] ?>" name="cp" >
                        </div>

                        <div class="mb-3">
                            <label for="metros" class="form-label">Metros Cuadrados</label>
                            <input type="number" class="form-control" id="metros" value="<?php echo $row['metros'] ?>" name="metros" >
                        </div>

                        <div class="mb-3">
                            <label for="zona" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zona" value="<?php echo $row['zona'] ?>" name="zona" >
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" value="<?php echo $row['precio'] ?>" name="precio" >
                        </div>
                <button type="submit" class="btn w-100 btnIndex mt-3" name="modificar">Modificar</button>
                <?php }  ?>
            </form>

                <a href="../admin_dashboard.php"  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Volver al menú</a>
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