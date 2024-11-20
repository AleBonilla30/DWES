<?php
if (isset($_REQUEST['Enviar'])) {
    $num1 = trim(strip_tags($_REQUEST['numero1']));
    $num2 = trim(strip_tags($_REQUEST['numero2']));
    $operacion = trim(strip_tags($_REQUEST['operacion']));
    $resultado = null;
    
    if ($num1 == "" || $num2 == "") {
        echo "<p>Por favor, complete todos los campos.</p>";
    }elseif (!is_numeric($num1) || !is_numeric($num2)) {
        echo "<p>Por favor, ingrese valores númericos en ambos campos.</p>";
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
                    echo "<p>El numero introducido es $num2, por lo tanto no se puede dividir</p>";
                }
                break;
            
            default:
                echo "<p>Operacion no validad..</p>";
                break;
        }
        if ($resultado !== null) {
            print "<p><strong>El resultado de los numeros $num1 y $num2 es: $resultado</strong></p>";
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