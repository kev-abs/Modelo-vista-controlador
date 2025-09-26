<?php


class PedidoService {
    private $apiUrl;

    public function __construct() {
        global $urlPedido;
        $this->apiUrl = $urlPedido;
    }

    public function obtenerPedidos() {
        $respuesta = file_get_contents($this->apiUrl);
        if ($respuesta === FALSE) {
            return false; 
        }
        return json_decode($respuesta, true); 
    }

    public function agregarPedidos($id_Cliente, $fecha_Pedido, $estado, $total) {
        $data_json = json_encode([
            "id_Cliente" => $id_Cliente,
            "fecha_Pedido" => $fecha_Pedido,
            "estado" => $estado,
            "total" => $total
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

    public function actualizarPedidos($id_Pedido, $id_Cliente, $fecha_Pedido, $estado, $total) {
        $data_json = json_encode([
            "id_Cliente"   => $id_Cliente,
            "fecha_Pedido" => $fecha_Pedido,
            "estado"       => $estado,
            "total"        => $total
        ]);

        $url = $this->apiUrl . "/" . $id_Pedido;

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


