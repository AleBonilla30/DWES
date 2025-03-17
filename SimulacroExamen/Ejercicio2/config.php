<?php
$conn = mysqli_connect('localhost', 'root', '', 'examensim');

if (!$conn) {
    die("Conexion fallida " . mysql_affected_rows());
}

?>