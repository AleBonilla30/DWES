<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Insertar Usuario</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Insertar usuario</h1>
        <div class="mt-3">
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Introduce nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Introduce apellido</label>
                    <input type="text" class="form-control" name="apellido">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Introduce email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Introduce edad</label>
                    <input type="number" class="form-control" name="edad">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-success" name="agregar" value="Insertar usuario">
                </div>
            </form>
            <div class="bt-3">
                <a href="index.php">Volver al menu principal</a>
            </div>
        </div>

        <?php
        include 'config/conffig.php';

        if (isset($_REQUEST['agregar'])) {
            $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
            $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $edad = mysqli_real_escape_string($conn, $_POST['edad']);

            if ($nombre == '' && $apellido === '' && $email === '' && $edad === '') {
                echo '<div class="alert alert-danger" role="alert">
                    Error, ingrese todos los datos!
                    </div>';
            }else {
                $sql = "INSERT INTO usuarios (nombre, apellido, email, edad) VALUES ('$nombre','$apellido', '$email', '$edad')";
                if (mysqli_query($conn, $sql)){
                    echo '<div class="alert alert-success" role="alert">
                        Usuario agreado correctamente!
                        </div>';
                }else {
                    echo '<div class="alert alert-danger" role="alert">
                        Error al agregar el usuario!
                        </div>';
                }
            }
            
            
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>