<?php
$conn = mysqli_connect('localhost', 'root', '', 'examensim');

if (!$conn) {
    die('Error en la base de datos' . mysqli_connect_error());
}

?>