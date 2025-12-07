<?php
class CuponService {
    private $apiUrl;

    public function __construct() {
        global $urlCupon;
        $this->apiUrl = $urlCupon;
    }

    // Obtener todos los cupones
    public function obtenerCupones() {
        $response = file_get_contents($this->apiUrl);

        if ($response === false) {
            return [];
        }

        $decoded = json_decode($response, true);

        if (!is_array($decoded)) {
            return [];
        }

        $resultado = [];
        foreach ($decoded as $fila) {

            $resultado[] = [
                "id_Cupon" => $fila["id_Cupon"] ?? null,
                "codigo"  => $fila["codigo"] ?? null,
                "descuento"  => $fila["descuento"] ?? null,
                "fecha_expiracion"  => $fila["fecha_Expiracion"] ?? null
            ];
        }

        return $resultado;
    }


    // Crear cupón
    public function nuevoCupon($codigo, $descuento, $fechaExpiracion) {
        $nuevoCupon = [
            "codigo" => $codigo,
            "descuento" => (float)$descuento,
            "fecha_Expiracion" => $fechaExpiracion
        ];

        $data_json = json_encode($nuevoCupon);

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Content-Length: " . strlen($data_json)
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            "success" => ($http_code >= 200 && $http_code < 300),
            "mensaje" => "HTTP $http_code. Respuesta: " . $response . " " . ($error ?? "")
        ];
    }

    // Actualizar cupón
    public function actualizarCupon($id, $codigo, $descuento, $fechaExpiracion) {
        $data_json = json_encode([
            "codigo" => $codigo,
            "descuento" => (float)$descuento,
            "fecha_Expiracion" => $fechaExpiracion
        ]); 

        $ch = curl_init($this->apiUrl . "/" . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Content-Length: " . strlen($data_json)
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            "success" => ($http_code >= 200 && $http_code < 300),
            "mensaje" => "HTTP $http_code. Respuesta: " . $response
        ];
    }


    // Eliminar cupón
    public function eliminarCupon($id) {
        $ch = curl_init($this->apiUrl . "/" . $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($http_code === 200 || $http_code === 204)
            ? ["success" => true, "mensaje" => "Cupón eliminado correctamente."]
            : ["success" => false, "mensaje" => "Error al eliminar cupón. HTTP: $http_code"];
    }
}
