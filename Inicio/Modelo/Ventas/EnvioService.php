<?php


class EnvioService {
    private $apiUrl;

    public function __construct() {
        global $urlEnvio;
        $this->apiUrl = $urlEnvio;
    }

    public function obtenerEnvios() {
    $proceso = curl_init($this->apiUrl);
    curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($proceso);
    $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

    if (curl_errno($proceso)) {
        $error = curl_error($proceso);
        curl_close($proceso);
        return ["error" => $error];
    }
    curl_close($proceso);

    if ($http_code === 200) {
        return json_decode($respuesta, true);
    } else {
        return ["error" => "HTTP $http_code - $respuesta"];
    }
}

    public function agregarEnvios($id_Pedido, $direccionEnvio, $fechaEnvio, $metodoEnvio, $estadoEnvio) {
        $data_json = json_encode([
            "id_Pedido" => $id_Pedido,
            "direccionEnvio" => $direccionEnvio,
            "fechaEnvio" => $fechaEnvio,
            "metodoEnvio" => $metodoEnvio,
            "estadoEnvio" => $estadoEnvio
        ]);

        $proceso = curl_init($this->apiUrl);

        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json)
        ]); 

        $respuestaPet = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            $error = curl_error($proceso);
            curl_close($proceso);
            return ["success" => false, "error" => $error];
        }
        curl_close($proceso);


        if ($http_code === 200 || $http_code === 201) {
            return ["success" => true];
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }

    }

    public function actualizarEnvios($id_Envio, $id_Pedido, $direccionEnvio, $fechaEnvio, $metodoEnvio, $estadoEnvio) {
        $data_json = json_encode([
            "id_Pedido" => $id_Pedido,
            "direccion_Envio" => $direccionEnvio,
            "fechaEnvio" => $fechaEnvio,
            "metodoEnvio" => $metodoEnvio,
            "estadoEnvio" => $estadoEnvio
        ]);

        $url = $this->apiUrl . "/" . $id_Envio;

        $proceso = curl_init($url);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json)
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