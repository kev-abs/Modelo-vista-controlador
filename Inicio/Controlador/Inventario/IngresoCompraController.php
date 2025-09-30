<?php
require_once __DIR__ . '/../../Modelo/Inventario/IngresoCompraService.php';
require_once __DIR__ . "/../../Confi/Confi.php";

class IngresoCompraController {
    private $ingresoService;

    public function __construct() {
        $this->ingresoService = new IngresoCompraService();
    }

    public function manejarPeticion() {
        $mensaje = "";
        $ingresos = $this->ingresoService->obtenerIngresoCompras();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion      = $_POST['accion'] ?? "";
            $idIngreso   = trim($_POST['id_Ingreso'] ?? "");
            $idEmpleado  = trim($_POST['id_Empleado'] ?? "");
            $idProveedor = trim($_POST['id_Proveedor'] ?? "");
            $total       = trim($_POST['total'] ?? "");

            // ================== AGREGAR ==================
            if ($accion === "agregar") {
                $resultado = $this->ingresoService->nuevoIngreso($idEmpleado, $idProveedor, $total);
                $mensaje = $resultado['error'] === false
                    ? "<p style='color:green;'>{$resultado['mensaje']}</p>"
                    : "<p style='color:red;'>Error: {$resultado['mensaje']}</p>";
            }

            // ================== ACTUALIZAR ==================
            if ($accion === "actualizar") {
                if (!empty($idIngreso)) {
                    $resultado = $this->ingresoService->actualizarIngreso($idIngreso, $idEmpleado, $idProveedor, $total);
                    $mensaje = $resultado['success']
                        ? "<p style='color:green;'>Ingreso actualizado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>El ID es obligatorio para actualizar.</p>";
                }
            }

            // ================== ELIMINAR ==================
            if ($accion === "eliminar") {
                if (!empty($idIngreso)) {
                    $resultado = $this->ingresoService->eliminarIngreso($idIngreso);
                    $mensaje = $resultado['success']
                        ? "<p style='color:green;'>Ingreso eliminado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>El ID es obligatorio para eliminar.</p>";
                }
            }

            // refrescar lista después de cada acción
            $ingresos = $this->ingresoService->obtenerIngresoCompras();
        }

        require __DIR__ . '/../../Vista/Inventario/IngresoCompraVista.php';
    }
}
