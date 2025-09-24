<?php
$controller = isset($_GET['Controller']) ? $_GET['Controller'] : 'inicio';
$action = isset($_GET['action']) ? $_GET['action'] : 'manejarPeticion';

switch ($controller) {
    case 'cliente':
        require_once './Inicio/Controlador/ClienteController.php';
        $controlador = new ClienteController();
        break;

    case 'inicio':
    default:
        require_once './Inicio/Controlador/inicioController.php';
        $controlador = new InicioController();
        break;
}

// Ejecuta la acción
if (method_exists($controlador, $action)) {
    $controlador->$action();
} else {
    echo "La acción '$action' no existe en el controlador '$controller'.";
}
