<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <title>Conexción</title>
</head>
<body>

    <div>


    <?php
    $host = "localhost";
    $dbname= "Empresa";
    $username = "root";
    $password = "";

    try {
        
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        //CREAR LA BASE DE DATOS
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $pdo->exec($sql);
        
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //CRETAR TABLA
        $sqlTabla = "CREATE TABLE IF NOT EXISTS empleados (id INT AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(100) NOT NULL, apellido VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL UNIQUE, salario DECIMAL(10,2)NOT NULL)";

        $pdo->exec($sqlTabla);
        //configuracion de la excepcion
        /* echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Conexion exitosa!</strong> regresa al menu principal.
                <a href='index.php' class='link-opacity-100'>Regresa al menu</a>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div> "; */
    
        } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    }



    ?>
    </div>

</body>
</html>