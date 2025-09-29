<?php
class InventarioController {
    // Vista principal del módulo inventario
    public function index() {
        include_once __DIR__ . "/../../Vista/Inventario/inventario.php";
    }

    // Submódulo: Ingreso de compras
    public function ingresoCompra() {
        include_once __DIR__ . "/../../Vista/Inventario/ingresoCompra.php";
    }

    // Submódulo: Cupones
    public function cupon() {
        include_once __DIR__ . "/../../Vista/Inventario/cupon.php";
    }
}
?>
