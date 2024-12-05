<?php

if (isset($_REQUEST['enviar'])) {
    $numero1 = $_REQUEST['num1'];
    $numero2 = $_REQUEST['num2'];
    $numero3 = $_REQUEST['num3'];

    if ($numero1 == "" && $numero2== "" && $numero3 == "") {
        echo "<p>Por favor, rellene todos los números</p>";
    }else{
    function numeroMayor($num1, $num2, $num3)  {
        $mayor = max($num1, $num2, $num3);

        
        echo "<h1>Resultado!</h2>";
        echo "<p>El numero mayor de los 3 numeros es: <strong>$mayor</strong</p>";
        
    }
    numeroMayor($numero1, $numero2, $numero3);
    }
}else {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero Mayor</title>
    <style>
        body{
            background: linear-gradient(135deg, #e7bd6e , #feefd4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            max-width: 600px;
            padding: 30px;
            border: 1px solid gainsboro;
            background-color: #f5f5f5;
        }
        .container:hover {
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
        }
        .container h1{
            text-shadow: 0 2px 4px rgba(0,0,0,0.3)
        }
        label{
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #555;
        }
        input{
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin:5px;
            border-radius: 20px;
            cursor: pointer;
            border: 1px solid #ddd;
        }
        input:focus{
            border-color: rgb(231, 193, 123);
            box-shadow: 0 0 5px rgba(231,193,123,0.5);
            outline: none;
        }
        input[type="submit"]{
            margin-top: 20px;
            background-color:rgb(221, 178, 96) ;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
        }

    input[type="submit"]:hover{
    background-color: rgb(247, 206, 128) ;
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

        
    </style>
</head>
<body>
    <div class="container">
        <h1>Introducir tres números</h1><br>

    <form action="Ejercicio1.php" method="post">
        <label for="num1">Introduce el primer número</label>
        <input type="number" name="num1">
        <label for="num2">Introduce el segundo número</label>
        <input type="number" name="num2">
        <label for="num3">Introduce el tercer número</label>
        <input type="number" name="num3">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    </div>
    

</body>
</html>
<?php } ?>
