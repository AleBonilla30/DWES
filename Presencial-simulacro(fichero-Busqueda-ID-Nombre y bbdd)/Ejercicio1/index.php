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

    <div class="container">
    <h1>Buscar Producto</h1>
    
    <form method="POST" action="">
        <input type="text" name="search_term" placeholder="Ingrese ID o nombre del producto" required>
        <input type="submit" value="Buscar" name="buscar">
    </form>

    <?php
    if (isset($_REQUEST['buscar']) && !empty($_REQUEST['buscar'])) {
        $busqueda = trim(strip_tags($_POST['search_term']));

        $fichero = "inventario.txt";
        $result = array();
        
        if (!file_exists($fichero)) {
            die('El archivo no existe');
        }


        $encontrado = false;
        $archivo = file($fichero);

        foreach($archivo as $linea){
            $producto = explode(':', $linea);

            if (stripos($producto[0], $busqueda) !== false || stripos($producto[1], $busqueda) !== false) { //stripos verifica si las palabras estan presentes en el array

                $result[] = $producto;
                
                $encontrado = true;
                break;
            }

        }

        if (count($result)) {
            echo "<hr>";
            echo "<p>Producto encontrado</p>";

            foreach ($result as $producto) {
                echo "<p>ID:$producto[0]</p>";
                echo "<p>Nombre:$producto[1]</p>";
                echo "<p>Cantidad:$producto[2]</p>";
                echo "<p>Precio: $producto[3]€</p>";
            }
        }else {
            echo "<p>❌ Producto no encontrado</p>";
        }
    }

    ?>
    </div>
    

    
</body>
</html>
