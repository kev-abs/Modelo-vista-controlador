<?php
require_once __DIR__ . "/../../Confi/Confi.php";
require_once __DIR__ . "/../../Modelo/Inventario/CuponService.php";
require_once __DIR__ . "/../../Modelo/Inventario/IngresoCompraService.php";

class InventarioController {
    private $cuponService;
    private $ingresoService;

    public function __construct() {
        $this->cuponService = new CuponService();
        $this->ingresoService = new IngresoCompraService();
    }

    // ================= VISTA PRINCIPAL =================
    public function index() {
        include_once __DIR__ . "/../../Vista/Inventario/InventarioVista.php";
    }

    // ================= INGRESO DE COMPRA =================
    public function consultarIngresoCompra() {
        $ingresos = $this->ingresoService->obtenerIngresoCompras();
        include_once __DIR__ . "/../../Vista/Inventario/IngresoCompra/IngresoConsultarVista.php";
    }

    public function agregarIngresoCompra() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idEmpleado  = trim($_POST['id_Empleado'] ?? "");
            $idProveedor = trim($_POST['id_Proveedor'] ?? "");
            $total       = trim($_POST['total'] ?? "");

            if ($idEmpleado && $idProveedor && $total) {
                $resultado = $this->ingresoService->nuevoIngreso($idEmpleado, $idProveedor, $total);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>{$resultado['mensaje']}</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['mensaje']}</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Campos obligatorios vacíos.</div>";
            }
        }

        include_once __DIR__ . "/../../Vista/Inventario/IngresoCompra/IngresoAgregarVista.php";
    }

    public function editarEliminarIngresoCompra() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion      = $_POST['accion'] ?? "";
            $idIngreso   = trim($_POST['id_Ingreso'] ?? "");
            $idEmpleado  = trim($_POST['id_Empleado'] ?? "");
            $idProveedor = trim($_POST['id_Proveedor'] ?? "");
            $total       = trim($_POST['total'] ?? "");

            if ($accion === "actualizar" && $idIngreso && $idEmpleado && $idProveedor && $total) {
                $resultado = $this->ingresoService->actualizarIngreso($idIngreso, $idEmpleado, $idProveedor, $total);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Ingreso actualizado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['mensaje']}</div>";
            }

            if ($accion === "eliminar" && $idIngreso) {
                $resultado = $this->ingresoService->eliminarIngreso($idIngreso);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Ingreso eliminado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['mensaje']}</div>";
            }
        }

        $ingresos = $this->ingresoService->obtenerIngresoCompras();
        include_once __DIR__ . "/../../Vista/Inventario/IngresoCompra/IngresoActualizarEliminarVista.php";
    }

    // ================= CUPONES =================
    public function consultarCupones() {
        $cupones = $this->cuponService->obtenerCupones();
        include_once __DIR__ . "/../../Vista/Inventario/Cupon/CuponConsultarVista.php";
    }

    public function agregarCupon() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigo    = trim($_POST['Codigo'] ?? "");
            $descuento = trim($_POST['Descuento'] ?? "");
            $fechaExp  = trim($_POST['Fecha_Expiracion'] ?? "");

            if ($codigo && $descuento && $fechaExp) {
                $resultado = $this->cuponService->nuevoCupon($codigo, $descuento, $fechaExp);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>{$resultado['mensaje']}</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['mensaje']}</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Campos obligatorios vacíos.</div>";
            }
        }

        include_once __DIR__ . "/../../Vista/Inventario/Cupon/CuponAgregarVista.php";
    }

    public function editarEliminarCupon() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion    = $_POST['accion'] ?? "";
            $idCupon   = trim($_POST['id_Cupon'] ?? "");
            $codigo    = trim($_POST['Codigo'] ?? "");
            $descuento = trim($_POST['Descuento'] ?? "");
            $fechaExp  = trim($_POST['Fecha_Expiracion'] ?? "");

            if ($accion === "actualizar" && $idCupon && $codigo && $descuento && $fechaExp) {
                $resultado = $this->cuponService->actualizarCupon($idCupon, $codigo, $descuento, $fechaExp);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>{$resultado['mensaje']}</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['mensaje']}</div>";
            }

            if ($accion === "eliminar" && $idCupon) {
                $resultado = $this->cuponService->eliminarCupon($idCupon);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>{$resultado['mensaje']}</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['mensaje']}</div>";
            }
        }

        $cupones = $this->cuponService->obtenerCupones();
        include_once __DIR__ . "/../../Vista/Inventario/Cupon/CuponActualizarEliminarVista.php";
    }
}
?>
