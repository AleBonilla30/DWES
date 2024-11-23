<?php

if (isset($_REQUEST['enviar'])) {
    
    $nombre = trim(strip_tags($_REQUEST['nombre'] ));
    $apellido = trim(strip_tags($_REQUEST['apellido'] ));
    $edad = trim(strip_tags($_REQUEST['edad'] ));
    $peso = trim(strip_tags($_REQUEST['peso'] ));
    $sexo = trim(strip_tags($_REQUEST['sexo'] ));
    $estadoCivil = trim(strip_tags($_REQUEST['estado']));
    $aficiones = $_REQUEST['aficiones'];

    if ($nombre == "" || $apellido == "" || $edad == "" || $peso == "" || $sexo == "" || $estadoCivil == "" || $aficiones == "") {
        echo "<p style='font-size: 25px; text-align: center; border: 5px dotted #cc8f1f; padding: 20px; width: 50%;'>Por favor, rellena todos los campos</p>";
    }else {
        echo "<div style='border: 4px dotted #cc8f1f; font-size: 25px; padding: 10px; max-width: 400px; align-items: center'>";

        echo "<p>Su nombre es <b>$nombre</b></p>";
        echo "<p>Sus apellido son <b>$apellido</b></p>";
        echo "<p>Tiene entre <b>$edad</b></p>";
        echo "<p>Su peso es de <b>$peso</b></p>";
        echo "<p>Es <b>$sexo</b></p>";
        echo "<p>Su estado civil es <b>$estadoCivil</b></p>";
        echo "<p>Le gusta <b>" .implode(", ", $aficiones) . "</b></p>";

        echo "<a href='formulario.php'> <input type='submit' value='Volver al formulario' style=' border: none;
            padding: 10px;
            background-color: #f3a921;
            cursor: pointer;
            border-radius: 10px;
            color: white;'></a>";

        echo "</div>";
    }

}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body{
            font-size: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f3d194 ,#fceccf); 
            margin: 0;
            padding: 0;
        }
        .container{
            max-width: 900px;
            width: 550px;
            height: 500px;
            margin-top: 15px;
            border-radius: 20px;
            border: 1px solid gainsboro;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 1px 4px 7px rgba(0,0,0,0.4);
        }
        h1{
            text-align: center;
            color: #f3a921; 
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        label{
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 95%;
            box-sizing: border-box;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 10px;
            border: none;
        }
        .sexo-container, .estadoCivil-container, .aficiones-container{
            display: inline-block;
            width:100%;
            margin-top: 10px;
            margin-right: 10px;
        }
        input[type="radio"], input[type="checkbox"]{
            marin-right: 5px;
        
        }

        input[type="submit"], input[type="reset"]{
            width:45%;
            margin-top: 25px;
            margin-left: 10px;
            border: none;
            padding: 10px;
            background-color: #f3a921;
            cursor: pointer;
            border-radius: 10px;
            color: white;

        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #edca89;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Formulatio de Registro</h1>
        <form action="formulario.php" method="post">
            <label for="nombre" >Nombre:</label>
            <input type="text" name="nombre">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido">
            <label for="edad">Edad:</label>
            <select name="edad" id="edad">
                <option value="">--Selecciones una opción--</option>
                <option value="20-39">Entre 20 y 39 años </option>
                <option value="40-59">Entre 40 y 59 años </option>
                <option value="60-79">Entre 60 y 79 años </option>
            </select>
            <label for="peso">Peso:</label>
            <input type="number" name="peso"> kg

            <div class="sexo-container">
            <label for="sexo">Sexo:</label>
            <input type="radio" name="sexo" value="hombre">
            <label for="hombre">Hombre</label>
            <input type="radio" name="sexo" value="mujer">
            <label for="mujer">Mujer</label>
            </div>

            <div class="estadoCivil-container">
                <label for="estado">Estado Civil:</label>
                <input type="radio" name="estado" value="soltero">
                <label for="estado">Soltero</label>
                <input type="radio" name="estado" value="casado">
                <label for="estado">Casado</label>
                <input type="radio" name="estado" value="otro">
                <label for="estado">Otro</label>
            </div>

            <div class="aficiones-container">
                <label for="aficiones">Aficiones:</label>
                <input type="checkbox" name="aficiones[]" value="cine">
                <label for="aficiones">Cine</label>
                <input type="checkbox" name="aficiones[]" value="deporte">
                <label for="aficiones">Deporte</label>
                <input type="checkbox" name="aficione[]s" value="literatura">
                <label for="aficiones">Literatura</label>
                <input type="checkbox" name="aficiones[]" value="musica">
                <label for="aficiones">Música</label>
                <input type="checkbox" name="aficiones[]" value="tebeos">
                <label for="aficiones">Tebeos</label>
                <input type="checkbox" name="aficiones[]" value="television">
                <label for="aficiones">Televisión</label>
            </div>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="Borrar">
        </form>
    </div>
</body>
</html>

<?php } ?>