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
            $direccion_Envio   = trim($_POST["direccion_Envio"] ?? "");
            $fecha_Envio       = trim($_POST["fecha_Envio"] ?? "");
            $metodo_Envio      = trim($_POST["metodo_Envio"] ?? "");
            $estado_Envio      = trim($_POST["estado_Envio"] ?? "");

            if ($accion === "agregar") {
                if (!empty($id_Pedido) && !empty($direccion_Envio) && !empty($fecha_Envio) && !empty($metodo_Envio) && !empty($estado_Envio)) {
                    $resultado = $this->envioService->agregarEnvios($id_Pedido, $direccion_Envio, $fecha_Envio, $metodo_Envio, $estado_Envio);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Envio agregado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            if ($accion === "actualizar") {
                if (!empty($id_Envio) && !empty($id_Pedido) && !empty($direccion_Envio) && !empty($fecha_Envio) && !empty($metodo_Envio) && !empty($estado_Envio)) {
                    $resultado = $this->envioService->actualizarEnvios($id_Envio, $id_Pedido, $direccion_Envio, $fecha_Envio, $metodo_Envio, $estado_Envio);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Envio actualizado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            header("Location: index.php?Controller=ventas&msg=" . urlencode($mensaje));
            exit();
        }
    include __DIR__ . '/../../Vista/Venta/PedidoVista.php';
    }   
    
}
