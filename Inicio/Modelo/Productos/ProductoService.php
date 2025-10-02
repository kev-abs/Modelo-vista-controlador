<?php 
class ProductoService {
    private $apiUrl;

    public function __construct() {
        global $urlProducto;
        $this->apiUrl = $urlProducto;
    }



    private $jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhZG1pbiIsImlhdCI6MTc1OTM3MzE0NiwiZXhwIjoxNzU5NDU5NTQ2fQ.zYpTFWgsukxyEagLCKPYtMMRMpWuyOQLBgAizM88670";


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

        if (is_array($decoded)){
            foreach ($decoded as $fila){

                $partes = array_map('trim', explode('|', $fila));
                if (count($partes) >= 7) {
                    $resultado[] = [
                        'id_Producto' => $partes[0],
                        'nombre'      => $partes[1],
                        'descripcion' => $partes[2],
                        'precio'      => $partes[3],
                        'stock'       => $partes[4],
                        'id_Proveedor'=> $partes[5],
                        'imagen'      => $partes[6],
                        'estado'      => $partes[7]
                    ];
                }
            }
        }
        return ["success" => true, "data" => $resultado];
    }

    /* -------------------- POST -------------------- */
    public function agregarProducto($nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen = null, $estado = null) {
        $datosPost = [
            "nombre"      => $nombre,
            "descripcion" => $descripcion,
            "precio"      => $precio,
            "stock"       => $stock,
            "idProveedor" => $id_Proveedor,
            "imagen"      => $imagen,
            "estado"      => $estado
        ];
        $data_json = json_encode($datosPost);

        $proceso = curl_init($this->apiUrl);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json),
            "Authorization: Bearer {$this->jwtToken}"
        ]);

        $respuestaPet = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            $error = curl_error($proceso);
            curl_close($proceso);
            return ["success" => false, "error" => $error];
        }
        curl_close($proceso);

        if ($http_code >= 200 && $http_code < 300) {
            return ["success" => true, "response" => json_decode($respuestaPet, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code", "response" => $respuestaPet];
        }
    }

    /* -------------------- PUT -------------------- */
    public function actualizarProductos($id_Producto, $nombre, $descripcion, $precio, $stock, $id_Proveedor, $imagen = null, $estado = null) {
        $data_json = json_encode([
            "id_Producto" => $id_Producto,
            "nombre"      => $nombre,
            "descripcion" => $descripcion,
            "precio"      => $precio,
            "stock"       => $stock,
            "idProveedor" => $id_Proveedor,
            "imagen"      => $imagen,
            "estado"      => $estado
    ]);

    $url = $this->apiUrl . "/" . $id_Producto;

    $proceso = curl_init($url);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json),
            "Authorization: Bearer {$this->jwtToken}"
        ]);

    $respuestaPet = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            $error = curl_error($proceso);
            curl_close($proceso);
            return ["success" => false, "error" => $error];
        }
        curl_close($proceso);

        if ($http_code === 200) {
            return ["success" => true];
        } else {
            return ["success" => false, "error" => "HTTP $http_code - $respuestaPet"];
        }
    }
    

}

?>
