<?php
// ModeloInicio.php
class ModeloInicio {
    private $modulos;

    public function __construct() {
        $this->modulos = [
            "usuarios"   => "/../../usuarios.php",
            "ventas"     => "ventas",
            "inventario" => "inventario",
            "productos"  => "productos"
        ];
    }

    public function obtenerModulos() {
        return $this->modulos;
    }

    public function obtenerRuta($modulo) {
        return $this->modulos[$modulo] ?? null;
    }
}
