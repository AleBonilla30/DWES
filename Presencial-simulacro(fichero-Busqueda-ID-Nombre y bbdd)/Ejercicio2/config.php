<?php
$conn = mysqli_connect('localhost', 'root', '', 'inventario');

if (!$conn) {
    die('Conexión fallida:' . mysqli_connect_error());
}

?>