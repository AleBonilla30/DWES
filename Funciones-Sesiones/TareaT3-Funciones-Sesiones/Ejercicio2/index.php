<?php session_start() ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        ul {
            list-style: none; 
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            display: block; 
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #5bb984;
            color: white;
            text-decoration: none; 
            border-radius: 15px;
            font-size: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            box-sizing:border-box;
            transition: transform 0.2s, background-color 0.2s;
        }
        a:hover {
            background-color: #82deaa; 
            transform: scale(1.05); 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Menú Principal</h1>
        <p>Elegir una opción</p>
        <ul>
            <li><a href="nombre.php">Escribir tu nombre</a></li>
            <li><a href="apellido.php">Escribir tu Apellido</a></li>
            <li><a href="verDatos.php">Ver nombre y apellido</a></li>
            <li><a href="borrarDatos.php">Borrar la información</a></li>
        </ul>

    </div>
</body>
</html>