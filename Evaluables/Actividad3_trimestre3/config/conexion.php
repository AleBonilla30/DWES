<?php
$conn = mysqli_connect('localhost', 'root', '', 'eventos_tech');
if (!$conn) {
    die('Conexión fallida'. mysqli_connect_error());
}

?>