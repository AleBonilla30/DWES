<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Operaciones Artimeticas</title>

    <link rel="stylesheet" href="utils/style.css">

    
</head>
<body>
    <div class="container">
    <h1>Operaciones Aritméticas</h1>
    <form action="datos_operaciones.php" method="get">
        <label for="numero1">Introduzca el primer número:</label>
        <input type="number"  name="numero1" require>
        <label for="numero2">Introduzca el segundo número:</label>
        <input type="number"  name="numero2" require>

        <label >Seleccione la operación:</label>
        <div class="group-radio-container">

        <div class="group-radio">
            <input type="radio" name="operaciones" value="suma">
            <label for="suma">Suma</label>
        </div>
        
        <div class="group-radio">
            <input type="radio" name="operaciones" value="resta">
            <label for="resta">Resta</label>
        </div>
        
        <div class="group-radio">
            <input type="radio"  name="operaciones" value="producto">
            <label for="producto">Producto</label>
        </div>
        
        <div class="group-radio">
            <input type="radio" name="operaciones" value="cociente">
            <label for="cociente">Cociente</label><br>
        </div>

        </div>
        
        

        <input type="submit" value="Enviar datos">
    </form>

    </div>
    
</body>
</html>