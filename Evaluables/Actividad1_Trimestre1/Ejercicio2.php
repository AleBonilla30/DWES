<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        body{
            background: linear-gradient(135deg, #f4ddb0, #2a5298);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            color: #ffffff;
            margin: 0;
            padding: 0;
            padding-bottom: 50px;
        }
        h1{
            background: rgba(0,0,0,0.5);
            padding:10px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 20px;
            font-size: 2.5em;
        }
        .ronda, .resultado{
            background: rgba(255,255,255,0.1);
            margin: 20px auto;
            padding: 15px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            width: 80%;
            max-width: 800px;

        }
        
        .player1, .player2{
            font-size: 1.5em;
            font-weight: bold;
        }
        .player1 {
            color: #ff6666;
        }

        .player2 {
            color:  #66ff66;
        }
        img {
            margin: 5px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, box-shadow 0.3 ease;
        }
        img:hover{
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.5);
        }
        p{
            margin: 10px 0;
            font-size: 1.2em;
        }

        .ganador{
            font-size: 1.5em;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(255,255,255,0.7)
        }
        
    </style>
</head>
<body>
<!-- Lanzamiento de Dados:
Cada jugador lanzará 5 dados. Puedes usar la función rand() 
para simular el lanzamiento de un dado de seis caras (valores entre 1 y 6).
Almacena los resultados de los dos jugadores en dos vectores, una para cada jugador.

Determinación del Ganador:
Después de cada tirada, compara los resultados de ambos jugadores.
•	Suma los valores obtenidos en los 5 dados de cada jugador.
•	El jugador con la suma total más alta gana la ronda.
•	Si ambos jugadores tienen la misma suma total, la ronda se considera un empate.
Mostrar Resultados:

Después de cada ronda, muestra el resultado de esa ronda, indicando quién ganó o si hubo un empate.
Lleva un registro de las rondas ganadas por cada jugador a lo largo del juego.

Utiliza funciones en PHP para estructurar tu código y hacerlo más legible.
Proporciona una salida clara que indique los resultados de cada ronda y el progreso del juego.
-->

<h1>Juego de dados</h1>
    <?php 

    

        function lanzamientoDados() {
            $resultado = [];
            for ($i=0; $i < 5; $i++) { 
                $dado = rand(1,6);
                $resultado[] = $dado;
                print "<img src ='./img/dados/$dado.jpg' width =100 height = 100/>\n";
            }
            return $resultado;

        
    }
    

    function sumaDeDados($resultado)  {
        $suma = 0;
        foreach ($resultado as $valor ) {
            $suma += $valor;
        }
        return $suma;
    }

    function obtenerGanador($jugador1Tiradas, $Jugador2Tiradas)  {
        if ($jugador1Tiradas > $Jugador2Tiradas) {
            print "Jugador 1 ha ganado esta ronda 🎲!!!";
        }elseif ($Jugador2Tiradas > $jugador1Tiradas) {
            print "Jugador 2 ha ganado esta ronda 🎲!!!";
        }else {
            print "Ha habido un empate ✨";
        }
    }

    $jugador1 = 0;//almacena las rondas ganadas
    $jugador2 = 0;
    $numeroRondas = 3;//establezco un numero de rondas(aunque podria ser un numero aleatorio)
    

    for ($i = 1; $i <= $numeroRondas ; $i++) { 
        print "<div class='ronda'>";
        print "<h2>Ronda $i</h2>";

        print "<h3 class='player1'>Jugador 1</h3>";
        $jugador1Tirada = lanzamientoDados();
        $sumaJugador1 = sumaDeDados($jugador1Tirada);
        print "<p>Jugador 1: $sumaJugador1</p>";

        print "<h3 class='player2'>Jugador 2</h3>";
        $jugador2Tirada = lanzamientoDados(); 
        $sumaJugador2 = sumaDeDados($jugador2Tirada);
        print "<p>Jugador 2: $sumaJugador2</p>";


        //se muestra el resultado de cada ronda
        $resultadoPorRonda = obtenerGanador($sumaJugador1, $sumaJugador2);
        print "<p> $resultadoPorRonda</p>";
        print "</div>";

        //se actualiza el conteo de las rondas 

        if ($sumaJugador1 > $sumaJugador2) {
            $jugador1++;
        }elseif ($sumaJugador2 > $sumaJugador1) {
            $jugador2++;
        }

        

    }

    //muestro los resultados finales
    print "<div class='resultado'>";
    print "<h2>Resultados Finales:</h2>";
    print "<p>El jugador 1 ganó $jugador1 rondas! </p>";
    print "<p>El jugador 2 ganó $jugador2 rondas! </p>";

    if ($jugador1 > $jugador2) {
        print "<h3 class='ganador'>El jugador 1 ganó todo juego 🏆</h3>";
    }elseif ($jugador2 > $jugador1) {
        print "<h3 class='ganador'>El jugador 2 ganó todo juego 🏆</h3>";
    }else {
        print "<h3 class='ganador'>El juego acabó en empate ✨</h3>";
    }

    print "</div>";


    ?>
</body>
</html>