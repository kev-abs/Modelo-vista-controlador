<?php
class ClienteService {
    private $apiUrl;

    public function __construct() {
        global $urlCliente;
        $this->apiUrl = $urlCliente;
    }


    public function obtenerClientes() {
        $respuesta = file_get_contents($this->apiUrl);
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

    public function actualizarCliente($id, $nombre, $correo, $telefono, $documento, $estado) {
        $datos = compact("nombre","correo","telefono","documento","estado");
        return $this->enviarPeticion("PUT", $this->apiUrl . "/$id", $datos);
    }

    public function eliminarCliente($id) {
        return $this->enviarPeticion("DELETE", $this->apiUrl . "/$id");
    }

    private function enviarPeticion($metodo, $url, $datos = null) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);
        if ($datos) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        $res = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            "success" => ($http_code >= 200 && $http_code < 300),
            "error"   => ($http_code >= 200 && $http_code < 300) ? null : "HTTP $http_code",
            "response"=> $res
        ];
    }
}
