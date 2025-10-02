<?php
class ProveedorService {
    private $apiUrl;

    public function __construct() {
        global $urlProveedores;
        $this->apiUrl = $urlProveedores;
    }

    // =================== OBTENER PROVEEDORES ===================
    public function obtenerProveedores() {
        $response = file_get_contents($this->apiUrl);
        $decoded = json_decode($response, true);

        if ($response === false) {
            return [];
        }

        $decoded = json_decode($response, true);
        $resultado = [];

        if (is_array($decoded)) {
            foreach ($decoded as $fila) {
                // Separar en partes (igual como en los otros módulos)
                $partes = array_map('trim', explode(" ", $fila));

                if (count($partes) >= 6) {
                    $resultado[] = [
                        "id_Proveedor"    => $partes[0] ?? null,
                        "nombre_empresa"  => $partes[1] ?? "",
                        "contacto"        => $partes[2] ?? "",
                        "telefono"        => $partes[4] ?? "",
                        "correo"          => $partes[5] ?? "",
                        "direccion"      => implode(" ", array_slice($partes, 6 )) 
                    ];
                }
            }
        }

        return $resultado;
    }
    
    public function nuevoProveedor($nombre, $contacto, $telefono, $correo, $direccion) {
        $nuevoProveedor = [
            "Nombre_Empresa" => $nombre,
            "Contacto"       => $contacto,
            "Telefono"       => (string)$telefono,
            "Correo"         => $correo,
            "Direccion"      => $direccion
        ];

        $data_json = json_encode($nuevoProveedor);

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
            "mensaje" => "HTTP $http_code. Respuesta: " . $response
        ];
    }

    public function actualizarProveedor($idProveedor, $nombreEmpresa, $contacto, $telefono, $correo, $direccion) {
        $data_json = json_encode([
            "Nombre_Empresa" => $nombreEmpresa,
            "Contacto"       => $contacto,
            "Telefono"       => (string)$telefono,
            "Correo"         => $correo,
            "Direccion"      => $direccion
        ]);

        $ch = curl_init($this->apiUrl . "/" . $idProveedor);
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

    public function eliminarProveedor($idProveedor) {
        $ch = curl_init($this->apiUrl . "/" . $idProveedor);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            "success" => ($http_code === 200 || $http_code === 204),
            "mensaje" => "HTTP $http_code. Respuesta: " . $response
        ];
    }
}
