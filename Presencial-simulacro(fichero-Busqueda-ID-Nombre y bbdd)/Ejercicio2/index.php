<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Ejercicio 2</title>
</head>
<body>
    <!-- 
Crea un sistema en PHP que permita buscar productos almacenados en una base
de datos MySQL. El sistema debe conectarse a la base de datos, realizar
búsquedas basadas en un término ingresado por el usuario y mostrar los
resultados en una tabla HTML.
Estructura de la tabla MySQL (productos.sql)
-->

    <div class="container mt-5">
        
        <h1>Buscar productos almacenados</h1>
        <form action="buscar.php" method="post">
            <label for="id" class="form-control">Introduce id </label>
            <input type="number" class="form-control"  name="id">
            <button class="btn btn-success mt-2" >Buscar</button>

        </form>

    </div>
</body>
</html>