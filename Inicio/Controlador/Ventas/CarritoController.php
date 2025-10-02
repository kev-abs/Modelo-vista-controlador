<?php
require_once __DIR__ . '/../../Confi/confi.php';
require_once __DIR__ . '/../../Modelo/Productos/ProductoService.php';
require_once __DIR__ . '/../../Modelo/Ventas/CarritoService.php';


class CarritoController {
    private $productoService;
    private $carritoService;

    public function __construct() {
        $this->productoService = new ProductoService();
        $this->carritoService = new CarritoService();
    }

    public function mostrar() {
        $carrito = $this->carritoService->obtenerCarrito();
        require __DIR__ . '/../../Vista/Venta/CarritoVista.php';
    }

    public function agregar($id) {
        $productos = $this->productoService->obtenerProductos();
        if ($productos['success']) {
            foreach ($productos['data'] as $p) {
                if ($p['id_Producto'] == $id) {
                    $this->carritoService->agregarProducto($p);
                    break;
                }
            }
        }
        header("Location: index.php?Controller=carrito&action=mostrar");
        exit();
    }

    public function eliminar($id) {
        $this->carritoService->eliminarProducto($id);
        header("Location: index.php?Controller=carrito&action=mostrar");
        exit();
    }

    public function vaciar() {
        $this->carritoService->vaciarCarrito();
        header("Location: index.php?Controller=carrito&action=mostrar");
        exit();
    }
}

