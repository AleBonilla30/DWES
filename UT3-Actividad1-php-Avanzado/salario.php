<?php
if (isset($_REQUEST['enviar'])) {
    $nombre = trim(strip_tags($_REQUEST['nombre']));
    $horas = trim(strip_tags($_REQUEST['horas']));
    $resultado = null;

    echo "<p>Bienvenido, $nombre tu calculo es el siguiente</p>";
    $resultado = $horas * 12;

    echo "<p>El salario semanal que recibes es de: <strong>$resultado</strong></p>";
    


}else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salario Semanal</title>
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