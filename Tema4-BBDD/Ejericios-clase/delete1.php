<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
</head>
<body>
    
    <form action="delete2.php" method="post">
        <fieldset>
            <legend>Eliminar productos de la lista</legend>
            <label for="id">ID:</label>
            <input type="number" name="id" required>
            <input type="submit" value="Eliminar producto">
        </fieldset>
    </form>
    <a href="index.php">Volver al menú</a>
</body>
</html>