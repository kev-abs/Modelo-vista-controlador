<?php

require_once __DIR__ . '/../../Confi/Confi.php';

class VentasController {
    public function index() {
        include __DIR__ . '/../../Vista/Venta/VentaVista.php';
    }

    public function manejarPeticion($action = null, $id = null) {
        $controlador = null;
        $metodo = null;

            switch ($action) {
                case 'Pedido':
                    require_once __DIR__ . '/PedidoController.php';
                    $controlador = new PedidoController();
                    $metodo = 'manejarPeticion';
                    break;

                case 'Envio':
                    require_once __DIR__ . '/EnvioController.php';
                    $controlador = new EnvioController();
                    $metodo = 'manejarPeticion';
                    break;

                default:
                    $this->index(); 
                    return;
            }


        if ($controlador !== null && $metodo !== null && method_exists($controlador, $metodo)) {
            if ($id !== null) {
                $controlador->$metodo($id);
            } else {
                $controlador->$metodo();
            }
        } else {
            echo "<div class='alert alert-danger'>Acción '$action' no encontrada en el controlador.</div>";
        }
    }
}
?>