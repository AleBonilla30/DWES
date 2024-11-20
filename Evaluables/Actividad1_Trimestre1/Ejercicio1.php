<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        body {
            background: linear-gradient(135deg, #c3f3e6, #534f39);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        
        }
        .container{
            background: rgba(255,255,255,0.4);
            padding: 10px 30px;
            text-align: left;
            border-radius: 20px;
            box-shadow: 0 5px 15px rba(0,0,0,0.2);
        }
        .container:hover{
            transform: translateY(-5px);
        }
        p {
            font-family: Arial, sans-serif;
            color: black;
            font-size: 30px;
            font-weight: 800;
            text-align: center;
            margin: 0;
        }
        .asteriscos {
            display: inline-block;
            margin: 20px 0;
            
        }
        
        .asteriscos img{
            width: 30px;
            height: 30px;
            margin: 2px;
            border-radius: 5px;
            border: 1px solid gainsboro;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.3);
        }
        .asteriscos img:hover{
            transform: translateY(-5px);
        }
        

    </style>
</head>
<body>
    <!-- Realizar un programa PHP que generé 2 números aleatorios (entre 5 y 15)
    y me dibujé un rectángulo de asteriscos como se puesta en la figura: -->

    <div class="container">
    <?php

    $numero1 = rand(5,15);
    $numero2 = rand(5,15);
    $posiciones = "";

    echo "<p>Alto = $numero1</p>
        <p>Ancho = $numero2</p>";
    

    $posiciones .= "<div class='asteriscos'>";

    for ($i = 0; $i < $numero1; $i++){
        for ($j=0; $j < $numero2; $j++) { 
            $posiciones .= "<img src='./img/foto.jpg' alt='*'/>\n";
        }
        $posiciones .= "<br>";
    }
    $posiciones .= "</div>"; //cierro el contenedor de asteriscos

    echo $posiciones;

    ?>
    </div>
</body>
</html>