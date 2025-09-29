<?php
class CuponService {
    private $apiUrl;

    public function __construct() {
        global $urlCupon; // en Confi.php defines la URL de tu API REST para cupon
        $this->apiUrl = $urlCupon;
    }

    // Obtener todos los cupones
    public function obtenerCupones() {
        $response = file_get_contents($this->apiUrl);
        $decoded = json_decode($response, true);

        $resultado = [];
        if (is_array($decoded)) {
            foreach ($decoded as $fila) {
                $resultado[] = [
                    "id_Cupon" => $fila["ID_Cupon"] ?? null,
                    "codigo" => $fila["Codigo"] ?? "",
                    "descuento" => $fila["Descuento"] ?? 0,
                    "fecha_expiracion" => $fila["Fecha_Expiracion"] ?? ""
                ];
            }
        }
        return $resultado;
    }

    // Crear cupón
    public function nuevoCupon($codigo, $descuento, $fechaExpiracion) {
        $nuevoCupon = [
            "Codigo" => $codigo,
            "Descuento" => (int)$descuento,
            "Fecha_Expiracion" => $fechaExpiracion
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

        return ($http_code === 200 || $http_code === 201)
            ? ["success" => true, "mensaje" => "Cupón agregado correctamente."]
            : ["success" => false, "mensaje" => "Error al registrar cupón. HTTP: $http_code"];
    }

    // Actualizar cupón
    public function actualizarCupon($id, $codigo, $descuento, $fechaExpiracion) {
        $data_json = json_encode([
            "Codigo" => $codigo,
            "Descuento" => (int)$descuento,
            "Fecha_Expiracion" => $fechaExpiracion
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

        return ($http_code === 200)
            ? ["success" => true, "mensaje" => "Cupón actualizado correctamente."]
            : ["success" => false, "mensaje" => "Error al actualizar cupón. HTTP: $http_code"];
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
