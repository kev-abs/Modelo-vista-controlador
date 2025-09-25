<?php
// ModeloInicio.php
class ModeloInicio {
    private $modulos;

    public function __construct() {
        $this->modulos = [
            'usuarios' => [
                'label' => 'Usuarios',
                'ruta'  => 'index.php?Controller=usuarios'
            ],
            'ventas' => [
                'label' => 'Ventas',
                'ruta'  => 'index.php?Controller=ventas'
            ],
            'inventario' => [
                'label' => 'Inventario',
                'ruta'  => 'index.php?Controller=inventario'
            ],
            'productos' => [
                'label' => 'Productos',
                'ruta'  => 'index.php?Controller=producto'
            ]
        ];
    }

    public function obtenerModulos() {
        return $this->modulos;
    }

    public function obtenerRuta($modulo) {
        return $this->modulos[$modulo] ?? null;
    }
}
