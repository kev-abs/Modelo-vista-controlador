<?php
class ClienteService {
    private $apiUrl;

    public function __construct() {
        global $urlCliente;
        $this->apiUrl = $urlCliente;
    }

    private $jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhZG1pbiIsImlhdCI6MTc1OTM3MzE0NiwiZXhwIjoxNzU5NDU5NTQ2fQ.zYpTFWgsukxyEagLCKPYtMMRMpWuyOQLBgAizM88670";


    public function obtenerClientes() {
        $headers =[
            "Authorization: Bearer {$this->jwtToken}"
        ];

        $context = stream_context_create([
            "http" => [
                "method" => "GET",
                "header" => implode("\r\n", $headers)
            ]
        ]);
        $respuesta = file_get_contents($this->apiUrl, false, $context);
        if ($respuesta === FALSE) return [];

        // Decodificar JSON
        $lineas = json_decode($respuesta, true);
        if (!is_array($lineas)) return [];

        $clientes = [];
        foreach ($lineas as $linea) {
            $datos = array_map('trim', explode("|", $linea));
            if (count($datos) >= 8) {
                $clientes[] = [
                    "ID_Cliente"     => $datos[0],
                    "Nombre"         => $datos[1],
                    "Correo"         => $datos[2],
                    "Contrasena"     => $datos[3],
                    "Fecha_Registro" => $datos[4],
                    "Estado"         => $datos[5],
                    "Documento"      => $datos[6],
                    "Telefono"       => $datos[7],
                ];
            }
        }
        return $clientes;
    }


    public function agregarCliente($nombre, $correo, $contrasena, $documento, $telefono, $estado) {
        $datos = compact("nombre","correo","contrasena","documento","telefono","estado");
        return $this->enviarPeticion("POST", $this->apiUrl, $datos);
    }

    public function actualizarCliente($id, $nombre, $correo, $contrasena, $telefono, $documento, $estado) {
        $datos = compact("nombre","correo","contrasena","telefono","documento","estado");
        return $this->enviarPeticion("PUT", $this->apiUrl . "/$id", $datos);
    }

    public function eliminarCliente($id) {
        return $this->enviarPeticion("DELETE", $this->apiUrl . "/$id");
    }

    private function enviarPeticion($metodo, $url, $datos = null) {
        $proceso = curl_init($url);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, $metodo);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer {$this->jwtToken}"
        ];

        if ($datos) {
            $jsonData = json_encode($datos);
            curl_setopt($proceso, CURLOPT_POSTFIELDS, $jsonData);
            $headers[] = 'Content-Length: ' . strlen($jsonData);
        }

        curl_setopt($proceso, CURLOPT_HTTPHEADER, $headers);

        $res = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if ($res === false) {
            $error = curl_error($proceso);
            curl_close($proceso);
            return [
                "success" => false,
                "error"   => "cURL error: $error",
                "response"=> null
            ];
        }

        curl_close($proceso);

        return [
            "success" => ($http_code >= 200 && $http_code < 300),
            "error"   => ($http_code >= 200 && $http_code < 300) ? null : "HTTP $http_code",
            "response"=> $res
        ];
    }
}
