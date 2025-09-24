<?php 
require_once __DIR__ . '/../Modelo/IngresoCompraService.php';

class IngresoCompraController {
    private $ingresoCompraService;

    public function __construct() {
        $this->ingresoCompraService = new IngresoCompraService();
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
        require __DIR__ . '/../Vista/IngresoCompra.php';
    }

    public function nuevoingreso() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idEmpleado  = $_POST['id_Empleado'];
            $idProveedor = $_POST['id_Proveedor'];
            $total       = $_POST['total'];

            $resultado = $this->ingresoCompraService->nuevoingreso($idEmpleado, $idProveedor, $total);

            $mensaje = $resultado['mensaje'] ?? '';
            $ingresos = $this->ingresoCompraService->obtenerIngresoCompras();

            require __DIR__ . '/../Vista/IngresoCompra.php';
        }
    }
}
