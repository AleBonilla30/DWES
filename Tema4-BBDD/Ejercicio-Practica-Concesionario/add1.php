<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Agregar Coches</title>
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px;">
    <h1 class="text-center text-success m-5">Agregar coche</h1>
    <form action="add2.php" method="post" class="alert alert-success p-4 shadow-lg rounded">
        <div class="row justify-content-center mt-4">
            <div class="col">
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" class="form-control" name="marca" required>
                </div>

                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" name="modelo" required>
                </div>

                <div class="mb-3">
                    <label for="anio" class="form-label">Año</label>
                    <input type="number" class="form-control" name="anio" required>
                </div>
                <div class="mb-3 d-grid gap-2">

                    <button type="submit" class="btn btn-success">Agregar coche</button>
                </div>
        
            </div>
        </div>
        
        <a href="index.php" class="d-block mt-2 text-primary">Volver al menú.</a>
    </form>

    </div>
</body>
</html>