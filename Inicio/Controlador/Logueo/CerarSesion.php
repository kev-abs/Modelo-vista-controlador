<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = [];

// Destruir la sesión en el servidor
session_destroy();

// Redirigir al inicio de sesión
header("Location: ../../Vista/Logueo/IniciarSesion.php");
exit();
