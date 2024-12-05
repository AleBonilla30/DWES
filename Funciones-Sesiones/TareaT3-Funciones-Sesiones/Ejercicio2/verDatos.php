<?php session_start()  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        a {
            flex: 1;
            display: block;
            margin-top: 5px; 
            padding: 10px 0;
            background-color: #5bb984;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 15px;
            font-size: 14px;
            box-sizing: border-box;
        }
        a:hover {
            background-color: #82deaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Datos guardados</h1>

        <?php
        if (isset($_SESSION['nombre'])) {

            $nombreGuardado = $_SESSION['nombre'];
            echo "<p>El nombre es: <strong>$nombreGuardado</strong></p>";
        }else{
            echo "<p>No tengo ningun nombre registrado ❌</p>";
        }

        if (isset($_SESSION['apellido'])) {
            
            $apellidoGuardado = $_SESSION['apellido'];
            echo "<p>El Apellido es: <strong>$apellidoGuardado</strong></p>";
        }else{
            echo "<p>No tengo ningun apellido registrado ❌</p>";
        }
        ?>
        <a href="index.php">Volver al menú principal</a>
    </div>
</body>
</html>