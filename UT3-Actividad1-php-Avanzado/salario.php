
<?php
if (isset($_REQUEST['enviar'])) {
    $nombre = trim(strip_tags($_REQUEST['nombre']));
    $horas = trim(strip_tags($_REQUEST['horas']));
    $resultado = null;

    echo "<p style='text-align: center; font-size: 25px; ' >Bienvenido, $nombre tu calculo es el siguiente</p>";
    $resultado = $horas * 12;

    echo "<p style='text-align: center; font-size: 25px;'>El salario semanal que recibes es de: <strong>$resultado</strong></p>";
    


}else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salario Semanal</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-item: center;
            height: 100vh;
        }
        .container{
            max-width: 550px;
            height:300px;
            margin-top: 150px;
            background-color: #f5f5f5;
            border: 1px solid gray;
            border-radius: 20px;
            padding: 20px;
        }
        .container:hover{
            box-shadow: 1px 4px 5px rgba(0,0,0,0.5);
        }
        h1{
            text-align: center;
            color: #56da5c;
        }
        label{
            display: flex;
            margin-bottom: 8px;
            font-size: 1.1em;
        }
        input{
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid green;
            box-sizing: border-box;
        }
        input:focus{
            border-color: border-color: rgba(128, 234, 133);
            box-shadow: 0 0 5px rgba(128,234,133,0.5);
            outline: none;
        }
        input[type="submit"]{
            margin-top: 30px;
            background: linear-gradient(135deg,#96ec9a ,#56da5c);
            border: none;
            cursor: pointer;
            color: white;
            font-size: 15px;
        }
        input[type="submit"]:hover{
            background: linear-gradient(279deg, #80c683,#b7c9b8 );
            transform: translate(-5px);
        }
    </style>
</head>
<body>
    <!-- Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas. Se pagarán 12 euros por hora. Las horas se piden en un formulario. -->
    <div class="container">
        <h1>Salario Semanal</h1>
        <form action="salario.php" method="post">
            <label for="nombre">Intriduce tu nombre:</label>
            <input type="text" name="nombre">
            <label for="salario">Introduce las horas trabajadas:</label>
            <input type="number" name="horas">

            <input type="submit" name="enviar" value="Calcular salario Semanal">
        </form>
    </div>
</body>
</html>

<?php } ?>