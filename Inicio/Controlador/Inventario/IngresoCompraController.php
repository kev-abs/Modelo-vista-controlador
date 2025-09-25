<?php 
require_once __DIR__ . '/../../Modelo/Inventario/IngresoCompraService.php';
require_once __DIR__ . "/../../Confi/Confi.php";

class IngresoCompraController {
    private $ingresoCompraService;

    public function __construct() {
        $this->ingresoCompraService = new IngresoCompraService();
    }

    public function index() {
        require __DIR__ . '/../../Vista/Inventario/IngresoCompraVista.php';
    }


    public function manejarPeticion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->nuevoingreso();
        } else {
            $this->listarIngresos();
        }
    }

    private function listarIngresos() {
        $ingresos = $this->ingresoCompraService->obtenerIngresoCompras();
        $mensaje = '';
        require __DIR__ . '/../../Vista/Inventario/IngresoCompraVista.php';
    }

    public function nuevoingreso() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idEmpleado  = $_POST['id_Empleado'];
            $idProveedor = $_POST['id_Proveedor'];
            $total       = $_POST['total'];

            $resultado = $this->ingresoCompraService->nuevoingreso($idEmpleado, $idProveedor, $total);

            $mensaje = $resultado['mensaje'] ?? '';
            $ingresos = $this->ingresoCompraService->obtenerIngresoCompras();
            require __DIR__ . '/../ ../Vista/Inventario/IngresoCompraVista.php';
        }
    }
}
