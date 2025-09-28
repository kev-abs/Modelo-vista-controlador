<?php
session_start();            // Inicia sesión si no está iniciada
session_unset();            // Limpia todas las variables de sesión
session_destroy();          // Destruye la sesión

// Evitar que el navegador guarde en caché la sesión destruida
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirigir al login
header("Location: /ModeloVistaControlador/index.php?Controller=login&action=mostrarFormulario");
exit();
