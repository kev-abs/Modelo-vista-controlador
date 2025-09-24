<?php 
class IngresoCompraService{
    private $apiUrl = "http://localhost:8080/ingresocompra";

    public function obtenerIngresoCompras(){ //Get
        $response = file_get_contents($this->apiUrl);
            return json_decode($response, true);
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




    

}