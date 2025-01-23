<?php

$mensaje = '';

if (isset($_REQUEST['registrar'])) {
    $nombre = $_REQUEST['nombre'];
    $apellido1 = $_REQUEST['apellido1'];
    $apellido2 = $_REQUEST['apellido2'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $fichero = 'agenda.txt';

    //se crea una cadena con los datos separados por comas
    $registro = implode(',', [$nombre, $apellido1, $apellido2, $telefono, $email]);
    
    //se abre el archivo
    $archivo = fopen($fichero, 'a');
    
    //se escribe
    fputs($archivo, $registro . PHP_EOL);

    fclose($archivo);

    $mensaje = 'El usuario ha sido registrado con éxito ✔';
    
}else{
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Registro de usuario</title>
</head>
<body>
    <div class="container">
        <h1>Regstrar Usuarios</h1>
    <form action="#" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="apellido1">Primer apellido:</label>
        <input type="text" name="apellido1" required>
        <label for="apellido2">Segundo apellido:</label>
        <input type="text" name="apellido2" required>
        <label for="telefono">Telefono:</label>
        <input type="number" name="telefono" required>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" required>
        <input type="submit" value="Registrar" name="registrar">
        <a href="index.php">Volver a página de inicio</a>
    </form>
    <div>
        <?php
        if(!empty($menaje)) {

            echo " <p style='color: green; margin-top: 10px;'>$mensaje;</p>";
        }
        ?>
            
        
        
    </div>
    </div>

</body>
</html> 
