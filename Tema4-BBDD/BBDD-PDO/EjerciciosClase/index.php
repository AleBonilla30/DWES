<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base  de Datos PDO</title>
</head>
<body>
    <h1>PDO Ejemplos mysql</h1>
    <main>
        <?php
        require_once "biblioteca.php";

        conectaDb();

        /* borraTodo(); */

        insertaRegistro("Juan", "Garcia");

        cuentaRegistros();

        muestraRegistros();

        modificaRegistro(1, "Paco", "Luis");

        muestraRegistros();

        insertaRegistro("Ana", "Nigerio");

        cuentaRegistros();

        muestraRegistros();

        borraRegistros([1 => "on"]);

        muestraRegistros();
        ?>
</main>
</body>
</html>