<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=== 'POST') {

    $mensaje= "";

    //verifico que boton se presiono
    if (isset($_REQUEST['accion']) && $_REQUEST['accion'] === "guardar") {
        
        $nombre = trim(strip_tags($_POST['nombre'])) ;
        if (empty($nombre)) {
            $mensaje = "<p style='color: red;'>Por favor, ingrese su nombre ❌</p>";
        }else{
            $_SESSION['nombre'] = $nombre;
            $mensaje ="<p>Nombre guardado correctamente! ✔</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre</title>
    <style>
        label{
            display: block;
            margin-bottom: 10px;
        }
        input{
            width: 100%;
            padding: 10px;
            border: 1px solid gainsboro;
            border-radius: 15px;
            box-sizing: border-box;
        }

        .button-container {
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
        p {
            margin-top: 15px;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="post">
            <label for="nombre">Introduce tu nombre:</label>
            <input type="text" name="nombre" require>
            <div class="button-container">
                <button type="submit" name="accion" value="guardar">Guardar</button>
                <a href="index.php">Volver al menú</a>
            </div>
        </form>
        <?php
            if (!empty($mensaje)) {
                echo $mensaje;
            }
        ?>

    </div>
    
</body>
</html>