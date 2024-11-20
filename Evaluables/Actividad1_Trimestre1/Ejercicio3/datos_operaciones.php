<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de las operaciones</title>
    <link rel="stylesheet" href="utils/style.css">
</head>
<body>
    <div class="container">
        <h1>Resultado de las operaciones</h1>

    
    <?php
    if ($_REQUEST['numero1'] == "" || $_REQUEST['numero2'] == "") {
        print "Por favor, complete todos los campos.";

    }else {
        $num1 = trim(strip_tags($_REQUEST['numero1']));
        $num2 = trim(strip_tags($_REQUEST['numero2']));
        $operaciones = trim(strip_tags($_REQUEST['operaciones']));
        $resultado = null;

        switch ($operaciones) {
            
            case 'suma':
                print "<h2>Has elegido suma</h2>";
                $resultado = $num1 + $num2;
                
                break;
            case 'resta':
                print "<h2>Has elegido resta</h2>";
                $resultado = $num1 - $num2;
                
                break;
            case 'producto':
                print "<h2>Has elegido producto</h2>";
                $resultado = $num1 * $num2;
                
                break;
            case 'cociente':
                print "<h2>Has elegido cociente</h2>";
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                }else {
                    print "No se puede dividir un numero por cero";
                }
                break;
            
            default:
                print "Operación no valida...";
                break;
        }
        if ($resultado !== null) {
        
            print "<p><strong>El resultado de los numeros $num1 y $num2 es: $resultado</strong></p>";
        }
    }
    ?>
    <a href="operaciones.php" style="text-decoration: none;">
        <input type="submit"  value="Volver a la pagina anterior">
    </a>
    </div>
</body>
</html>