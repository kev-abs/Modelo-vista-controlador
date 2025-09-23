<?php
// ModeloInicio.php
class ModeloInicio {
    private $modulos;

    public function __construct() {
        $this->modulos = [
            "usuarios"   => "Modulo_usuarios/indexCliente.php",
            "ventas"     => "Modulo ventas/indexVentas.php",
            "inventario" => "Modulo inventario/indexInventario.php",
            "productos"  => "Modulo productos/indexProductos.php"
        ];
    }

    public function obtenerModulos() {
        return $this->modulos;
    }

    public function obtenerRuta($modulo) {
        return $this->modulos[$modulo] ?? null;
    }
}
