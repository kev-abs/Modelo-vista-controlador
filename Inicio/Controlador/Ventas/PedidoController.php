<?php
require_once __DIR__ . '/../../Modelo/Ventas/PedidoService.php';

class PedidoController {

    private $pedidoService;

    public function __construct()
    {
        $this->pedidoService = new PedidoService();
    }

    public function manejarPedido() {
    $mensaje = "";
    $Pedidos = $this->pedidoService->obtenerPedidos();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = $_POST["accion"] ?? "";

            $id_Pedido    = trim($_POST["id_Pedido"] ?? "");
            $id_Cliente   = trim($_POST["id_Cliente"] ?? "");
            $fecha_Pedido = trim($_POST["fecha_Pedido"] ?? "");
            $estado       = trim($_POST["estado"] ?? "");
            $total        = trim($_POST["total"] ?? "");

            if ($accion === "agregar") {
                if (!empty($id_Cliente) && !empty($fecha_Pedido) && !empty($estado) && !empty($total)) {
                    $resultado = $this->pedidoService->agregarPedidos($id_Cliente, $fecha_Pedido, $estado, $total);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Pedido agregado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }

            if ($accion === "actualizar") {
                if (!empty($id_Pedido) && !empty($id_Cliente) && !empty($fecha_Pedido) && !empty($estado) && !empty($total)) {
                    $resultado = $this->pedidoService->actualizarPedidos($id_Pedido, $id_Cliente, $fecha_Pedido, $estado, $total);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Pedido actualizado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }
        }

    require __DIR__ . '/../../Vista/Venta/index.php';
    }   
    
}
