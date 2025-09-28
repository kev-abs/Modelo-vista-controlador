<?php 
require_once __DIR__ . '/../../Modelo/Inventario/IngresoCompraService.php';
require_once __DIR__ . "/../../Confi/Confi.php";

class IngresoCompraController {
    private $ingresoCompraService;

    public function __construct() {
        $this->ingresoCompraService = new IngresoCompraService();
    }

    
    public function manejarPeticion() {
        $mensaje = "";
        $ingresos = $this->ingresoCompraService->obtenerIngresoCompras();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? "";

            $idEmpleado  = trim($_POST['id_Empleado'] ?? "");
            $idProveedor = trim($_POST['id_Proveedor'] ?? "");
            $total       = trim($_POST['total'] ?? "");

            if ($accion === "agregar") {
                if (!empty($idEmpleado) && !empty($idProveedor) && !empty($total)) {
                    $resultado = $this->ingresoCompraService->nuevoingreso($idEmpleado, $idProveedor, $total);
                    $mensaje = ($resultado['error'] === false)
                        ? "<p style='color:green;'>Ingreso de compra agregado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            if ($accion === "actualizar") {
                $idIngreso = trim($_POST['id_Ingreso'] ?? "");
                if (!empty($idIngreso) && !empty($idEmpleado) && !empty($idProveedor) && !empty($total)) {
                    $resultado = $this->ingresoCompraService->actualizarIngreso($idIngreso, $idEmpleado, $idProveedor, $total);
                    $mensaje = $resultado['success'] ?? false
                        ? "<p style='color:green;'>Ingreso de compra actualizado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            if ($accion === "eliminar") {
                $idIngreso = trim($_POST['id_Ingreso'] ?? "");
                if (!empty($idIngreso)) {
                    $resultado = $this->ingresoCompraService->eliminarIngreso($idIngreso);
                    $mensaje = $resultado['success'] ?? false
                        ? "<p style='color:green;'>Ingreso de compra eliminado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>El ID del ingreso es obligatorio para eliminar.</p>";
                }
            }

        }

        require __DIR__ . '/../../Vista/Inventario/IngresoCompraVista.php';
    }
}