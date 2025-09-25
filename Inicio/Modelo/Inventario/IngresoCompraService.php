<?php 
class IngresoCompraService{
    private $apiUrl;

    public function __construct() {
        global $urlIngresoCompra;
        $this->apiUrl = $urlIngresoCompra;
    }

    public function obtenerIngresoCompras(){ //Get
        $response = file_get_contents($this->apiUrl);
        $decoded = json_decode($response, true);

        $resultado = [];

        if (is_array($decoded)) {
             foreach ($decoded as $fila) {
                    
                $partes = array_map('trim', explode('|', $fila));

                    if (count($partes) >= 5) {
                        $resultado[] = [
                            "id_Ingreso"   => $partes[0],
                            "id_Empleado"  => $partes[1],
                            "id_Proveedor" => $partes[2],
                            "fecha"        => $partes[3],
                            "total"        => $partes[4],
                        ];
                    }
                }
            }

         return $resultado;
    }
    

    public function nuevoingreso($idEmpleado, $idProveedor, $total) { //Post
        $nuevoIngreso = array(
            "id_Empleado"   => (int)$idEmpleado,
            "id_Proveedor"  => (int)$idProveedor,
            "total"         => number_format((float)$total, 2, '.', '')
        );

        $data_json = json_encode($nuevoIngreso);

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Content-Length: " . strlen($data_json)
        ));

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
           $error = curl_error($ch);
           curl_close($ch);
           return ["error" => true, "message" => $error];
        }

        curl_close($ch);

        if ($http_code === 200 || $http_code === 201) {
            return ["error" => false, "mensaje" => "Ingreso de compra registrado exitosamente."];
        } else {
            return ["error" => true, "mensaje" => "Error al registrar el ingreso de compra. Código HTTP: $http_code"];
        }
    }
    
    public function actualizarIngreso($idIngreso, $idEmpleado, $idProveedor, $total) {
            $data_json = json_encode([
                "id_Empleado"  => (int)$idEmpleado,
                "id_Proveedor" => (int)$idProveedor,
                "total"        => number_format((float)$total, 2, '.', '')
            ]);

            $url = $this->apiUrl . "/" . $idIngreso;

            $ch = curl_init("$this->apiUrl/$idIngreso");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json",
                "Content-Length: " . strlen($data_json)
            ]);

            $respuestaPet = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if (curl_errno($ch)) {
                $error = curl_error($ch);
                curl_close($ch);
                return ["success" => false, "error" => $error];
            }

            curl_close($ch);

            if ($http_code === 200) {
                return ["success" => true];
            } else {
                return ["success" => false, "error" => "HTTP $http_code - $respuestaPet"];
            }    
    }

    public function eliminarIngreso($idIngreso) {
        $url = $this->apiUrl . "/" . $idIngreso;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);

        $respuestaPet = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return ["success" => false, "error" => $error];
        }

        curl_close($ch);

        if ($http_code === 200 || $http_code === 204) {
            return ["success" => true];
        } else {
            return ["success" => false, "error" => "HTTP $http_code - $respuestaPet"];
        }
    }
}