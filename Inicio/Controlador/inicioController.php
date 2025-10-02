<?php
require_once __DIR__ . '/../Modelo/Productos/ProductoService.php';
require_once __DIR__ . '/../Confi/Confi.php';

class InicioController {
    private $service;

    public function __construct() {
        global $urlProducto;
        $this->service = new ProductoService();
    }

    public function index() {
        $resultado = $this->service->obtenerProductos();
        $productos = $resultado['success'] ? $resultado['data'] : [];
        require __DIR__ . '/../Vista/inicioVista.php';
    }

    public function manejarPeticion() {
        $resultado = $this->service->obtenerProductos();
        $productos = $resultado['success'] ? $resultado['data'] : [];
        require __DIR__ . '/../Vista/inicioVista.php';
    }
    public function verProductos() {
    require_once __DIR__ . '/../Modelo/Productos/ProductoService.php';
    $service = new ProductoService();
    $productos = $service->obtenerProductos()['data'];
    require __DIR__ . '/../Vista/Productos/NuestrosProductos.php';
    }

}

