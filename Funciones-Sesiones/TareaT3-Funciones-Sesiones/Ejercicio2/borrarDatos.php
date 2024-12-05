<?php session_start(); 
$mesaje ="";
if (isset($_REQUEST['borrar'])) {

    session_unset();//elimina todas las variables de la sesion
    session_destroy();//destruye la sesion

    $mensaje = "¡Información borrada correctamente ✔!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Datos</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .boton-container {
            display: flex; /* Coloca los elementos en fila */
            justify-content: space-between; /* Espacio entre los elementos */
            gap: 10px; /* Espaciado entre botón y enlace */
        }

        button {
            flex: 1;
            margin-top:5px;
            padding:10px 0;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 14px;
            box-sizing: border-box;
        } 
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
        <h1>Borrar Información</h1>
        

        <form method="post">
            <p>¿Estás seguro de que deseas borrar toda la información?</p>

            <div class="boton-container">
                <button type="submit" name="borrar">Borrar Informacion</button>

                <a href="index.php">Volver al menú</a>
            </div>
        </form>

        <?php
        if (!empty($mensaje)) {
            echo "<p>$mensaje</p>";
        }
        
        ?>

    </div>
    
</body>
</html>