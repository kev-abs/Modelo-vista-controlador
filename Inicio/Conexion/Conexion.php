<?php
$host = "localhost";
$usuario = "Manuel";
$contrasena = "Manuel251428";
$base_datos = "TiendaKshop";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
