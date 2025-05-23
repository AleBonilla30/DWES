<?php
// Archivo: conexion.php
$servidor = "localhost";
$usuario = "root";
$contrasena = "rootroot";
$basedatos = "ejercicio2";

$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
