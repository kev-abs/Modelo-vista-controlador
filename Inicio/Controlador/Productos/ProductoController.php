<?php 
require_once __DIR__ . '/../../Modelo/Productos/ProductoService.php';
require_once __DIR__ . '/../../Confi/Confi.php';

class ProductoController {
    private $productoService;
    private $apiUrl;

    public function __construct() {
        require __DIR__ . "/../../Confi/Confi.php";
        $this->productoService = new ProductoService();
        $this->apiUrl = $urlProducto;
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
    // ================= VER PRODUCTOS (catálogo para el cliente) =================
public function verProductos() {
    $mensaje = "";
    $productos = [];

    $resultado = $this->productoService->obtenerProductos();
    if ($resultado["success"]) {
        $productos = $resultado["data"];
    } else {
        $mensaje = "<div class='alert alert-danger'>Error: " . htmlspecialchars($resultado["error"]) . "</div>";
    }

    // Aquí cargas la vista del catálogo (Bootstrap con cards)
    require __DIR__ . "/../../Vista/Productos/Producto/NuestrosProductos.php";
}


    // ================= AGREGAR PRODUCTO =================
    public function agregarProducto() {
    $mensaje = "";

    // Ejecuta solo cuando el formulario envía POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Campos enviados por el formulario
        $nombre       = trim($_POST["nombre"]);
        $descripcion  = trim($_POST["descripcion"]);
        $precio       = trim($_POST["precio"]);
        $stock        = trim($_POST["stock"]);
        $id_Proveedor = trim($_POST["id_Proveedor"]);
        $estado       = trim($_POST["estado"]);

        // Imagen si fue seleccionada
        $imagen = null;
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $imagen = $_FILES["imagen"];
        }

        
        $resultado = $this->productoService->agregarProducto(
            $nombre,
            $descripcion,
            $precio,
            $stock,
            $id_Proveedor,
            $imagen,
            $estado
        );

        if ($resultado["success"]) {
            $mensaje = "<div class='alert alert-success'>Producto agregado correctamente.</div>";
        } else {
            $mensaje = "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
        }
    }

    // Cargar la vista del formulario
    require __DIR__ . "/../../Vista/Productos/Producto/ProductoAgregarVista.php";
}



    // ================= ACTUALIZAR PRODUCTO =================
public function actualizarProducto() {
    $mensaje = "";
    $producto = null;

    // --- CUANDO VIENE EL ID POR GET (MOSTRAR FORMULARIO) ---
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        $resultado = $this->productoService->obtenerProductoPorId($id);

        if ($resultado["success"]) {
            $producto = $resultado["data"];
        } else {
            $mensaje = "<div class='alert alert-danger'>Error: No se pudo cargar el producto</div>";
        }
    }

    // --- CUANDO SE ENVÍA EL FORMULARIO (POST) ---
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id_Producto  = trim($_POST["id_Producto"]);
        $nombre       = trim($_POST["nombre"]);
        $descripcion  = trim($_POST["descripcion"]);
        $precio       = trim($_POST["precio"]);
        $stock        = trim($_POST["stock"]);
        $idProveedor = trim($_POST["idProveedor"]);
        $estado       = trim($_POST["estado"]);

        $imagenNueva = null;
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $imagenNueva = $_FILES["imagen"]; 
        }
        $resultado = $this->productoService->actualizarProductos(
            $id_Producto,
            $nombre,
            $descripcion,
            $precio,
            $stock,
            $idProveedor,
            $imagenNueva,
            $estado 
        );

        if ($resultado["success"]) {
            $mensaje = "<div class='alert alert-success'>Producto actualizado correctamente.</div>";
        } else {
            $mensaje = "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
        }

        // ✔ Rellenar formulario de nuevo
        $producto = [
            "id_Producto" => $id_Producto,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock,
            "id_Proveedor" => $idProveedor,
            "estado" => $estado,
            "imagen" => $_POST["imagen_actual"]  // se mantiene la actual si no se cambia
        ];
    }

    require __DIR__ . "/../../Vista/Productos/Producto/ProductoActualizarVista.php";
}



    }
?>
