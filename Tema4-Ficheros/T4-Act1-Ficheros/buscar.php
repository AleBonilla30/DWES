<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>
    <div class="container">
        <P>Introduce usuario a buscar</P>
        <form action="#" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <label for="apellido1">Primer apellido:</label>
            <input type="text" name="apellido1">
            <input type="submit" value="Buscar" name="buscar">
            <a href="index.php">Volver a página de inicio</a>
        </form>
        <?php
    if (isset($_REQUEST['buscar'])) {

        $nombre = trim(strip_tags($_REQUEST['nombre']));
        $apellido = trim(strip_tags($_REQUEST['apellido1']));

        $fichero = 'agenda.txt';
        $archivo = fopen($fichero, 'r');

        if (file_exists($fichero)){
            $archivo = fopen($fichero, 'r');

            $encontrado = false;

            while (($linea = fgets($archivo)) !== false) {
                $linea = trim($linea);
                $contacto = explode(',', $linea);
                
                if (count($contacto) >=2 && $contacto[0] === $nombre && $contacto[1] === $apellido ) {
                    $encontrado = true;

                    $nombre1 = $contacto[0];
                    $apellido1 = $contacto[1];
                    $apellido2 = $contacto[2];
                    $telefono =  $contacto[3];
                    $email = $contacto[4] ;

                    echo "<hr>";
                    echo "<p><strong>Contacto encontrado:</strong></p>";
                    echo "<p>Nombre: $nombre1</p>";
                    echo "<p>Primer apellido: $apellido1</p>";
                    echo "<p>Segundo apellido: $apellido2</p>";
                    echo "<p>Teléfono: $telefono</p>";
                    echo "<p>Correo electrónico: $email</p>";
                    echo "<hr>";
                }
            }
            fclose($archivo);
        }
    
    
    }
    ?>
    </div>
    
</body>
</html>