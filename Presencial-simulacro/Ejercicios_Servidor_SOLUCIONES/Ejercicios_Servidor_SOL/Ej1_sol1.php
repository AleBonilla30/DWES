<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Producto - Sistema de Gestión de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; }
        h1 { color: #333; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 5px; width: 300px; }
        input[type="submit"] { padding: 5px 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .no-results { color: #ff0000; }
        .back-link { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Buscar Producto</h1>
    
    <form method="POST" action="">
        <input type="text" name="search_term" placeholder="Ingrese ID o nombre del producto" required>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_term = $_POST['search_term'];
        $file = file('inventario.txt', FILE_IGNORE_NEW_LINES);
        $results = array();

        foreach ($file as $line) {
            $product = explode(':', $line);
            if (stripos($product[0], $search_term) !== false || stripos($product[1], $search_term) !== false) { //stripos verifica si las palabras estan presentes en el array
                $results[] = $product;
            }
        }

        if (count($results) > 0) {
            echo "<h2>Resultados de la búsqueda:</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr>";
            foreach ($results as $product) {
                echo "<tr>";
                echo "<td>{$product[0]}</td>";
                echo "<td>{$product[1]}</td>";
                echo "<td>{$product[2]}</td>";
                echo "<td>{$product[3]}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='no-results'>No se encontraron productos que coincidan con la búsqueda.</p>";
        }
    }
    ?>

    <div class="back-link">
        <a href="index.php">Volver al menú principal</a>
    </div>
</body>
</html>
