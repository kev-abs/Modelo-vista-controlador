<?php 
require_once __DIR__ . '/../../Modelo/Productos/ProductoService.php';
require_once __DIR__ . '/../../Confi/Confi.php';

class ProductoController {
    private $productoService;

    public function __construct() {
        $this->productoService = new ProductoService();
    }

    public function index() {
        $this->consultarProductos();
    }

    // ================= LISTAR PRODUCTOS =================
    public function consultarProductos() {
        $mensaje = "";
        $productos = [];

        $resultado = $this->productoService->obtenerProductos();
        if ($resultado["success"]) {
            $productos = $resultado["data"];
        } else {
            $mensaje = "<div class='alert alert-danger'>Error: " . htmlspecialchars($resultado["error"]) . "</div>";
        }

        require __DIR__ . "/../../Vista/Productos/Producto/ProductoConsultarVista.php";
    }

    // ================= AGREGAR PRODUCTO =================
    public function agregarProducto() {
        $mensaje = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre       = trim($_POST["nombre"] ?? "");
            $descripcion  = trim($_POST["descripcion"] ?? "");
            $precio       = trim($_POST["precio"] ?? "");
            $stock        = trim($_POST["stock"] ?? "");
            $id_Proveedor = trim($_POST["id_Proveedor"] ?? "");
            $estado       = trim($_POST["estado"] ?? "");

            // Manejo de imagen
            $imagen = null;
            if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
                $tmpImagen   = $_FILES["imagen"]["tmp_name"];
                $nombreImagen = basename($_FILES["imagen"]["name"]);
                $carpetaDestino = __DIR__ . "/../../Public/Imagenes_productos/";

                if (move_uploaded_file($tmpImagen, $carpetaDestino . $nombreImagen)) {
                    $imagen = $nombreImagen;
                } else {
                    $mensaje = "<div class='alert alert-danger'>Error al subir la imagen.</div>";
                }
            }

            if ($nombre && $descripcion && $precio && $stock && $id_Proveedor && $estado) {
                $resultado = $this->productoService->agregarProducto($nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen, $estado);
                $mensaje = $resultado["success"]
                    ? "<div class='alert alert-success'>Producto agregado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
            }
        }

        require __DIR__ . "/../../Vista/Productos/Producto/ProductoAgregarVista.php";
    }

    // ================= ACTUALIZAR PRODUCTO =================
    public function actualizarProducto() {
        $mensaje = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_Producto  = trim($_POST["id_Producto"] ?? "");
            $nombre       = trim($_POST["nombre"] ?? "");
            $descripcion  = trim($_POST["descripcion"] ?? "");
            $precio       = trim($_POST["precio"] ?? "");
            $stock        = trim($_POST["stock"] ?? "");
            $id_Proveedor = trim($_POST["id_Proveedor"] ?? "");
            $estado       = trim($_POST["estado"] ?? "");

            // Manejo de imagen
            $imagen = null;
            if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
                $tmpImagen   = $_FILES["imagen"]["tmp_name"];
                $nombreImagen = basename($_FILES["imagen"]["name"]);
                $carpetaDestino = __DIR__ . "/../../Public/Imagenes_productos/";

                if (move_uploaded_file($tmpImagen, $carpetaDestino . $nombreImagen)) {
                    $imagen = $nombreImagen;
                } else {
                    $mensaje = "<div class='alert alert-danger'>Error al subir la imagen.</div>";
                }
            }

            if ($id_Producto && $nombre && $descripcion && $precio && $stock && $id_Proveedor && $estado) {
                $resultado = $this->productoService->actualizarProductos($id_Producto, $nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen, $estado);
                $mensaje = $resultado["success"]
                    ? "<div class='alert alert-success'>Producto actualizado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios para actualizar.</div>";
            }
        }

        require __DIR__ . "/../../Vista/Productos/Producto/ProductoActualizarVista.php";
    }

}
?>
