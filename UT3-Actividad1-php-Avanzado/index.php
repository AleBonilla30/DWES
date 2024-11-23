<?php
if (isset($_REQUEST['Enviar'])) {
    $num1 = trim(strip_tags($_REQUEST['numero1']));
    $num2 = trim(strip_tags($_REQUEST['numero2']));
    $operacion = trim(strip_tags($_REQUEST['operacion']));
    $resultado = null;
    
    if ($num1 == "" || $num2 == "") {
        echo "< style='font-size: 25px; text-align: center;'>Por favor, complete todos los campos.</p>";
    }elseif (!is_numeric($num1) || !is_numeric($num2)) {
        echo "<p style='font-size: 25px; text-align: center;'>Por favor, ingrese valores númericos en ambos campos.</p>";
    }else {
        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                break;
            case 'division':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                }else {
                    echo "<p style='font-size: 25px; text-align: center;'>El numero introducido es $num2, por lo tanto no se puede dividir</p>";
                }
                break;
            
            default:
                echo "<p style='font-size: 25px; text-align: center;'>Operacion no validad..</p>";
                break;
        }
        if ($resultado !== null) {
            print "<p style='font-size: 25px; text-align: center;'><strong>El resultado de los numeros $num1 y $num2 es: $resultado</strong></p>";
        }
    }


}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        body{
            font-family: self;
            display: flex;
            justify-content: center;
            align-item: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .container{
            max-width: 500px;
            height: 350px; 
            margin: 150px;
            align-item: center;
            background-color: #f5f5f5;
            padding: 30px;
            border: 1px solid gainsboro;
            border-radius: 20px;
            box-shadow: 0 3px 5px rgba(0,0,0,0.3);
        }
        label{
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
        }
        input{
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 10px;
            border: none;
            box-sizing: border-box;
        }
        select{
            width: 100%;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 1px solid gainsboro;
            padding: 10px;
        }
        input[type="submit"]{
            margin-top: 30px;
            background-color: green;
            color: white;
        }

    </style>
</head>
<body>
    <!--Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.  -->
    <div class="container">
        <h1>Operaciones Aritméticas</h1>
        <form action="index.php" method="post">
            <label for="num1">Introduce un número:</label>
            <input type="text" name="numero1" >
            <label for="num2">Introduce un segundo número:</label>
            <input type="text" name="numero2">
            <label for="operacion">Seleccione una opción:</label>
            <select name="operacion" id="operacion">
                <option value="">--Selecciona una opción</option>
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
            <input type="submit" name="Enviar" value="Enviar">
        </form>
    </div>
</body>
</html>

<?php } ?>