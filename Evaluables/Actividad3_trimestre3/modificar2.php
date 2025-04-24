<?php
include './config/conexion.php';
$id =  mysqli_real_escape_string($conn, trim($_POST['id']));
$sqlBusqueda = "SELECT * FROM eventos WHERE id = '$id' ";
$result = mysqli_query($conn, $sqlBusqueda);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
    <script src="https://kit.fontawesome.com/7ff4a0fa37.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="utils/css/style.css">
    <title>Modificar evento</title>
</head>
<body>
    <main>
        <div class="container-dashboard animate__animated animate__fadeInDown">
        
            <h1 class="text-center "><i class="fa-solid fa-pen-to-square"></i> Modificar Evento</h1>
            <form action="#" method="post">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="mb-3">
                    <label for="id" class="form-label">ID:</label>
                    <input type="number" class="form-control" name="id" value="<?php echo $row['id'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'] ?>">
                </div>
            
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha'] ?>">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo $row['descripcion']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" name="lugar" value="<?php echo $row['lugar'] ?>">
                </div>
                <div class="mb-3">
                    <label for="capacidad" class="form-label">Capacidad:</label>
                    <input type="number" class="form-control" name="capacidad" value="<?php echo $row['capacidad'] ?>">
                </div>
                <button type="submit" class="btn w-100 btnIndex mt-3" name="modificar">Modificar</button>
                <?php } ?>
            </form>
            <div>
                <?php
                if (isset($_POST['modificar'])) {
                    $id =  mysqli_real_escape_string($conn, trim($_POST['id']));
                    $nombre =  mysqli_real_escape_string($conn, trim($_POST['nombre']));
                    $fecha =  mysqli_real_escape_string($conn, trim($_POST['fecha']));
                    $descripcion =  mysqli_real_escape_string($conn, trim($_POST['descripcion']));
                    $lugar =  mysqli_real_escape_string($conn, trim($_POST['lugar']));
                    $capacidad =  mysqli_real_escape_string($conn, trim($_POST['capacidad']));

                    $sql = "UPDATE eventos SET nombre = '$nombre', fecha = '$fecha', descripcion = '$descripcion', lugar = '$lugar', capacidad = '$capacidad' WHERE id = '$id'";
                    if (mysqli_query($conn, $sql)) {
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        Evento modificado correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }else{
                        echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        No se ha podido modificar el evento. Error: '. mysqli_error($conn).'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="dashboard.php" class="link-light link-underline-opacity-0 fs-5"><i class="fas fa-arrow-left me-1"></i>Volver al menú</a>
            </div>
        </div>

    </main>
</body>
</html>