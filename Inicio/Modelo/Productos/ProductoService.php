<?php 
class ProductoService {
    private $apiUrl;

public function __construct() {
    $this->apiUrl = "http://localhost:8080/productos";
}

    private $jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhZG1pbiIsImlhdCI6MTc1OTQyNDQwNiwiZXhwIjoxNzU5NTEwODA2fQ.Rz7_kcunB46k67BTNoVu_h-cp3jcconErejXMXV8Ync";


public function obtenerProductoPorId($id) {
    $headers = [
        "Authorization: Bearer {$this->jwtToken}"
    ];

    $context = stream_context_create([
        "http" => [
            "method" => "GET",
            "header" => implode("\r\n", $headers)
        ]
    ]);

    $url = $this->apiUrl . "/" . $id;

    $response = file_get_contents($url, false, $context);

    if ($response === false) {
        return ["success" => false, "error" => "No se pudo obtener el producto"];
    }

    $decoded = json_decode($response, true);

    return ["success" => true, "data" => $decoded];
}

    /* -------------------- GET -------------------- */
    public function obtenerProductos(){
        $headers =[
            "Authorization: Bearer {$this->jwtToken}"
        ];
        $context = stream_context_create([
            "http" => [
                "method" => "GET",
                "header" => implode("\r\n", $headers)
            ]
        ]);
    
    $response = file_get_contents($this->apiUrl, false, $context);
    $decoded = json_decode($response, true);

$resultado = [];

if (is_array($decoded)) {
    foreach ($decoded as $fila) {

        $resultado[] = [
            'id_Producto' => $fila['id_Producto'] ?? null,
            'nombre'      => $fila['nombre'] ?? null,
            'descripcion' => $fila['descripcion'] ?? null,
            'precio'      => $fila['precio'] ?? null,
            'stock'       => $fila['stock'] ?? null,
            'id_Proveedor'=> $fila['id_Proveedor'] ?? null,
            'imagen'      => $fila['imagen'] ?? null,
            'estado'      => $fila['estado'] ?? null,
        ];
    }
}

return ["success" => true, "data" => $resultado];
    }

    /* -------------------- POST -------------------- */
    public function agregarProducto($nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen = null, $estado = null) {

    $postFields = [
        "nombre"      => $nombre,
        "descripcion" => $descripcion,
        "precio"      => $precio,
        "stock"       => $stock,
        "idProveedor" => $id_Proveedor,
        "estado"      => $estado
    ];

    // Imagen
    if ($imagen && $imagen["error"] === UPLOAD_ERR_OK) {
        $postFields["imagen"] = new CURLFile(
            $imagen["tmp_name"],
            $imagen["type"],
            $imagen["name"]
        );
    }

    $curl = curl_init($this->apiUrl . "/insertar");

    curl_setopt_array($curl, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer {$this->jwtToken}"
        ]
    ]);

    $respuesta = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        return [
            "success" => false,
            "error" => $error
        ];
    }

    return [
        "success" => true,
        "data" => json_decode($respuesta, true)
    ];
}

    
    /* -------------------- PUT -------------------- */
    public function actualizarProductos($id, $nombre, $descripcion, $precio, $stock, $idProveedor, $imagen, $estado) {

    $url = "http://localhost:8080/productos/actualizar/$id";

    $postFields = [
        "nombre" => $nombre,
        "descripcion" => $descripcion,
        "precio" => $precio,
        "stock" => $stock,
        "idProveedor" => $idProveedor,
        "estado" => $estado
    ];

    if (!empty($_FILES["imagen"]["name"])) {
        $postFields["imagen"] = new CURLFile(
            $_FILES["imagen"]["tmp_name"],
            $_FILES["imagen"]["type"],
            $_FILES["imagen"]["name"]
        );
    }

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_POSTFIELDS => $postFields
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        return ["success" => false, "error" => $error];
    }

    $decoded = json_decode($response, true);

    return [
        "success" => true,
        "data" => $decoded
    ];
}

}

?>
