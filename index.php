<?php
$controller = isset($_GET['Controller']) ? $_GET['Controller'] : 'inicio';
if ($controller === 'login') {
    $action = isset($_GET['action']) ? $_GET['action'] : 'mostrarFormulario';
} else {
    $action = isset($_GET['action']) ? $_GET['action'] : 'manejarPeticion';
}

switch ($controller) {
    
    case 'usuarios':
        require_once __DIR__ . '/Inicio/Controlador/Usuarios/ClienteController.php';
        $controlador = new ClienteController();
        break;

    case 'inicio':
    default:
        require_once './Inicio/Controlador/inicioController.php';
        $controlador = new InicioController();
        break;
    
    case 'inventario':
        require_once './Inicio/Controlador/Inventario/IngresoCompraController.php';
        $controlador = new IngresoCompraController();
        break;

    case 'ventas':
        require_once './Inicio/Controlador/Ventas/PedidoController.php';
        $controlador = new PedidoController();
        break;
    
    case 'producto':
        require_once './Inicio/Controlador/Productos/ProductoController.php';
        $controlador = new ProductoController();
        break;

    case 'login':
        require_once './Inicio/Controlador/Logueo/LoginController.php';
        $controlador = new LoginController();
        break;

}

// Ejecuta la acción
if (method_exists($controlador, $action)) {
    $controlador->$action();
} else {
    echo "La acción '$action' no existe en el controlador '$controller'.";
}
?>