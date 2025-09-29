<?php
require_once __DIR__ . '/../../Modelo/Inventario/CuponService.php';
require_once __DIR__ . "/../../Confi/Confi.php";

class CuponController {
    private $cuponService;

    public function __construct() {
        $this->cuponService = new CuponService();
    }

    public function manejarPeticion() {
        $mensaje = "";
        $cupones = $this->cuponService->obtenerCupones();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion     = $_POST['accion'] ?? "";
            $idCupon    = trim($_POST['id_Cupon'] ?? "");
            $codigo     = trim($_POST['Codigo'] ?? "");
            $descuento  = trim($_POST['Descuento'] ?? "");
            $fechaExp   = trim($_POST['Fecha_Expiracion'] ?? "");

            if ($accion === "agregar") {
                $resultado = $this->cuponService->nuevoCupon($codigo, $descuento, $fechaExp);
                $mensaje = $resultado['success']
                    ? "<p style='color:green;'>{$resultado['mensaje']}</p>"
                    : "<p style='color:red;'>Error: {$resultado['mensaje']}</p>";
            }

            if ($accion === "actualizar") {
                if (!empty($idCupon)) {
                    $resultado = $this->cuponService->actualizarCupon($idCupon, $codigo, $descuento, $fechaExp);
                    $mensaje = $resultado['success']
                        ? "<p style='color:green;'>{$resultado['mensaje']}</p>"
                        : "<p style='color:red;'>Error: {$resultado['mensaje']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>El ID es obligatorio para actualizar.</p>";
                }
            }

            if ($accion === "eliminar") {
                if (!empty($idCupon)) {
                    $resultado = $this->cuponService->eliminarCupon($idCupon);
                    $mensaje = $resultado['success']
                        ? "<p style='color:green;'>{$resultado['mensaje']}</p>"
                        : "<p style='color:red;'>Error: {$resultado['mensaje']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>El ID es obligatorio para eliminar.</p>";
                }
            }

            $cupones = $this->cuponService->obtenerCupones();
        }

        require __DIR__ . '/../../Vista/Inventario/CuponVista.php';
    }
}
