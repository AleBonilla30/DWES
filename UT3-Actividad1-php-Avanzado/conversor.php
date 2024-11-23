<?php

if (isset($_REQUEST['enviar'])) {
    $nombre= trim(strip_tags($_REQUEST['nombre']));
    $num = trim(strip_tags($_REQUEST['numero']));
    $resultado = 0;
    echo "<div style=' border: 5px dotted #c39bd3; max-width: 400px;'>";
    if ($nombre == "" || $num == "") {
        echo "<p style='text-align: center; font-size: 30px;'>Por favor, rellena los campos.</p>";
    }else{

        echo "<p style='text-align: center; font-size: 30px;'>¡Bienvenid@, $nombre al conversor.</p>";

        $resultado = $num / 1024;
        echo "<p style='text-align: center; font-size: 30px'>El resultado de la conversion de $num Kb es: <strong>$resultado Mb</strong></p>";
    }
    echo "</div>";
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-item: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            max-width: 500px;
            height: 300px;
            padding: 20px;
            border: 1px  solid gainsboro;
            border-radius: 20px;
            text-align: center;
            margin-top: 130px;
            background: linear-gradient(135deg, #f5f5f5, #c39bd3);
            box-shadow: 1px 5px 6px rgba(0,0,0,0.3);
        }
        input{
            width: 100%;
            padding: 15px;
            margin: 5px;
            border: none;
            border-radius: 20px;
            box-sizing: border-box;
        }
        input[type="submit"]{
            margin-top: 15px;
            background-color: #b78dbe;
            cursor: pointer;
            font-size: 1.1em;
        }
        input[type="submit"]:hover{
            background-color: #cfa9d5;
            transform: translateY(-5px);
        }
        input:focus{
            border-color: rgb(138, 95, 180);
            box-shadow: 0 0 5px rgba(138,95,180,0.5);
            outline: none;
        }
    </style>
</head>
<body>
    <!-- Realiza un conversor de Kb a Mb -->
    <div class="container">
        <h1>Conversor de KB a MB</h1>
        <form action="conversor.php" method="post">
            <input type="text" name="nombre" placeholder="Introduce tu nombre">
            <input type="number" name="numero" placeholder="Introduce los Kilobytes">
            <input type="submit" name="enviar" value= "Enviar Datos">

        </form>
    </div>
</body>
</html>
<?php } ?>