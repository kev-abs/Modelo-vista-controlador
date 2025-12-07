<?php
require_once __DIR__ . '/../../Modelo/Ventas/EnvioService.php';
require_once __DIR__ . '/../../Confi/Confi.php';


class EnvioController {

    private $envioService;

    public function __construct()
    {
        $this->envioService = new EnvioService();
    }

    public function manejarPeticion() {
    $mensaje = "";
    $Envios = $this->envioService->obtenerEnvios();
    $mensaje = $_GET["msg"] ?? "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = $_POST["accion"] ?? "";

            $id_Envio          = trim($_POST["id_Envio"] ?? "");
            $id_Pedido         = trim($_POST["id_Pedido"] ?? "");
            $direccionEnvio   = trim($_POST["direccionEnvio"] ?? "");
            $fechaEnvio       = trim($_POST["fechaEnvio"] ?? "");
            $metodoEnvio      = trim($_POST["metodoEnvio"] ?? "");
            $estadoEnvio      = trim($_POST["estadoEnvio"] ?? "");

            if ($accion === "agregar") {
                if (!empty($id_Pedido) && !empty($direccionEnvio) && !empty($fechaEnvio) && !empty($metodoEnvio) && !empty($estadoEnvio)) {
                    $resultado = $this->envioService->agregarEnvios($id_Pedido, $direccionEnvio, $fechaEnvio, $metodoEnvio, $estadoEnvio);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Envio agregado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            if ($accion === "actualizar") {
                if (!empty($id_Envio) && !empty($id_Pedido) && !empty($direccionEnvio) && !empty($fechaEnvio) && !empty($metodoEnvio) && !empty($estadoEnvio)) {
                    $resultado = $this->envioService->actualizarEnvios($id_Envio, $id_Pedido, $direccionEnvio, $fechaEnvio, $metodoEnvio, $estadoEnvio);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Envio actualizado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            if ($accion === "eliminar") {
                if (!empty($id_Envio)) {
                    $resultado = $this->envioService->eliminarEnvio($id_Envio);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Envio eliminado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>El ID del envío es obligatorio para eliminar.</p>";
                }
            }

            header("Location: index.php?Controller=ventas&action=Envio&msg=" . urlencode($mensaje));
            exit();
        }
    include __DIR__ . '/../../Vista/Venta/EnvioVista.php';
    }   
    
}
