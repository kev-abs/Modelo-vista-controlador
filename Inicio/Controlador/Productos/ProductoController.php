<?php 
require_once __DIR__ . '/../../Modelo/Productos/ProductoService.php';
require_once __DIR__ . '/../../Confi/Confi.php';

class ProductoController {
    private $productoService;

    public function __construct() {
        $this->productoService = new ProductoService();
    }

    public function manejarPeticion() {
        $mensaje = "";

        /* ---------- AGREGAR (POST) ---------- */
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = $_POST["accion"] ?? "";
            $nombre       = $_POST["nombre"];
            $descripcion  = $_POST["descripcion"];
            $precio       = $_POST["precio"];
            $stock        = $_POST["stock"];
            $id_Proveedor = $_POST["id_Proveedor"];
            $estado       = $_POST["estado"];
            $imagen       = null;

           if ($accion === "agregar") {
                if (!empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($stock) && !empty($id_Proveedor) && !empty($estado)) {
                    $resultado = $this->productoService->agregarProducto($nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen, $estado);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Producto agregado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }
            
            if ($accion === "actualizar") {
                $id_Producto  = $_POST["id_Producto"];
                if (!empty($id_Producto) && !empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($stock) && !empty($id_Proveedor) && !empty($estado)) {
                    $resultado = $this->productoService->actualizarProductos($id_Producto, $nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen, $estado);
                    $mensaje = $resultado["success"]
                        ? "<p style='color:green;'>Producto actualizado correctamente.</p>"
                        : "<p style='color:red;'>Error: {$resultado['error']}</p>";
                } else {
                    $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                }
            }
            
            
        }
    

        /* ---------- CARGAR LISTA SIEMPRE ---------- */
        $resultado = $this->productoService->obtenerProductos();
        if ($resultado["success"]) {
            $productos = $resultado["data"];
        } else {
            $mensaje .= "<p class='text-danger text-center'>"
                     . htmlspecialchars($resultado["error"])
                     . "</p>";
            $productos = [];

            header("Location: index.php?Controller=productos&msg=" . urlencode($mensaje));
            exit();//REVISAAAAAAAAAAR
            
        }
        

        include __DIR__ . "/../../Vista/Productos/Producto.php";
    }
}
?>
