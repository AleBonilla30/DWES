<?php
$conn = mysqli_connect('localhost', 'root', '', 'inmobiliaria');

if (!$conn) {
    die('Conexión fallida:' . mysqli_connect_error());
}
//solo se agrega include en cada pagina que se necesite abrir la conexion

?>