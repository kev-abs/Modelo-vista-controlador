<?php
class CarritoService {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    }

    public function obtenerCarrito() {
        return $_SESSION['carrito'];
    }

    public function agregarProducto($producto) {
        $id = $producto['id_Producto'];
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$id] = [
                "id" => $producto['id_Producto'],
                "nombre" => $producto['nombre'],
                "precio" => $producto['precio'],
                "cantidad" => 1
            ];
        }
    }

    public function eliminarProducto($id) {
        if (isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
        }
    }

    public function vaciarCarrito() {
        $_SESSION['carrito'] = [];
    }
}
