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
        <h1>Contactos</h1>
        <div class="mostrar">
        <?php
        $fichero = 'agenda.txt';
        $archivo = fopen($fichero, 'r');

        while (($linea = fgets($archivo)) !== false) {
            $contactos = explode(',', $linea);

            $nombre = $contactos[0];
            $apellido1 = $contactos[1];
            $apellido2 = $contactos[2];
            $telefono = $contactos[3];
            $correo = $contactos[4];

            echo "<p>Nombre: $nombre</p>";
            echo "<p>Primer apellido: $apellido1</p>";
            echo "<p>Segundo apellido: $apellido2</p>";
            echo "<p>Telefono: $telefono</p>";
            echo "<p>Correo electrónico: $correo</p>";
            echo "<hr>";

        }
        fclose($archivo);

        ?>
        <a href="index.php">Volver a página de inicio</a>
        </div>
        
    </div>
</body>
</html>