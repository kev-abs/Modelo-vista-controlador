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
        require_once "./Inicio/Controlador/Usuarios/usuarioController.php";
        $controlador = new UsuariosController();
        break;
    
    case 'inventario':
        require_once './Inicio/Controlador/Inventario/InventarioController.php';
        $controlador = new InventarioController();
        break;

    case 'ventas':
        require_once './Inicio/Controlador/Ventas/PedidoController.php';
        $controlador = new PedidoController();
        break;

    case 'envios':  
        require_once './Inicio/Controlador/Ventas/EnvioController.php';
        $controlador = new EnvioController();
        break;
    
    case 'producto':
        require_once './Inicio/Controlador/Productos/ProductoController.php';
        $controlador = new ProductoController();
        break;

    case 'login':
        require_once './Inicio/Controlador/Logueo/LoginController.php';
        $controlador = new LoginController();
        break;

    case 'panel':
        require_once './Inicio/Controlador/Usuarios/Paneles/PanelController.php';
        $controlador = new PanelController();
        break;

    
    case 'cupon':
    require_once './Inicio/Controlador/Inventario/CuponController.php';
    $controlador = new CuponController();
    break;


    case 'productos':
        require_once './Inicio/Controlador/inicioController.php';
        $controlador = new InicioController();
        break;
    
    case 'ingresocompra':
        require_once './Inicio/Controlador/Inventario/IngresoCompraController.php';
        $controlador = new IngresoCompraController();
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
