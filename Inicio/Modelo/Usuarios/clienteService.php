<?php
class ClienteService {
    private $apiUrl;

    public function __construct() {
        global $urlCliente;
        $this->apiUrl = $urlCliente;
    }


    public function obtenerClientes() {
        $respuesta = file_get_contents($this->apiUrl);
        if ($respuesta === FALSE) {
            return ["success" => false, "error" => "Error al conectar con la API: {$this->apiUrl}"];
        }
        return ["success" => true, "data" => json_decode($respuesta, true)];
    }

    public function agregarCliente($nombre, $correo, $contrasena, $documento, $telefono) {
        $datosPost = array(
            "nombre"     => $nombre,
            "correo"     => $correo,
            "contrasena" => $contrasena,
            "documento"  => $documento,
            "telefono" => $telefono
        );

        $data_json_post = json_encode($datosPost);

        $proceso = curl_init($this->apiUrl);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json_post);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json_post)
        ));

        $respuestapet = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            $error = curl_error($proceso);
            curl_close($proceso);
            return ["success" => false, "error" => $error];
        }

        curl_close($proceso);

        // Retorno consistente
        if ($http_code >= 200 && $http_code < 300) {
            return ["success" => true, "response" => json_decode($respuestapet, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code", "response" => $respuestapet];
        }
    }
}
