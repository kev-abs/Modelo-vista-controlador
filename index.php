<?php
$nombreController = isset($_GET['Controller']) ? $_GET['Controller'] : 'inicio';

if ($nombreController === 'login') {
    $action = isset($_GET['action']) ? $_GET['action'] : 'mostrarFormulario';
} else {
    $action = isset($_GET['action']) ? $_GET['action'] : 'manejarPeticion';
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

$controlador = null;

switch ($nombreController) {
    case 'inicio':
    default:
        require_once './Inicio/Controlador/inicioController.php';
        $controlador = new InicioController();
        break;
    
    case 'usuarios':
        require_once "./Inicio/Controlador/Usuarios/ClienteController.php";
        $controlador = new ClienteController();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        break;
    
    case 'inventario':
        require_once './Inicio/Controlador/Inventario/IngresoCompraController.php';
        $controlador = new IngresoCompraController();
        break;

    case 'ventas':
        require_once './Inicio/Controlador/Ventas/PedidoController.php';
        $controlador = new PedidoController();
        break;

    case 'login':
        require_once './Inicio/Controlador/Logueo/LoginController.php';
        $controlador = new LoginController();
        break;

    case 'panel':
        require_once './Inicio/Controlador/Usuarios/Paneles/PanelController.php';
        $controlador = new PanelController();
        break;
}

if ($controlador !== null) {
    if ($id !== null && method_exists($controlador, $action)) {
        $controlador->$action($id);
    } elseif (method_exists($controlador, $action)) {
        $controlador->$action();
    } else {
        $controlador->index();
    }
}
?>
