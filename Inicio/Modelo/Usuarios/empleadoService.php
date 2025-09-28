<?php
class EmpleadoService {
    private $apiUrl;

    public function __construct() {
        global $urlEmpleado;
        $this->apiUrl = $urlEmpleado;
    }

    public function obtenerEmpleados() {
        $respuesta = file_get_contents($this->apiUrl);
        if ($respuesta === FALSE) return [];

        $lineas = json_decode($respuesta, true);
        if (!is_array($lineas)) return [];

        $empleados = [];
        foreach ($lineas as $linea) {
            $datos = array_map('trim', explode("|", $linea));
            if (count($datos) >= 6) {
                $empleados[] = [
                    "ID_Empleado"       => $datos[0],
                    "Nombre"            => $datos[1],
                    "Cargo"             => $datos[2],
                    "Correo"            => $datos[3],
                    "Contrasena"        => $datos[4],
                    "Estado"            => $datos[5],
                    "Fecha_Contratacion"=> $datos[6] ?? null,
                ];
            }
        }
        return $empleados;
    }

    public function agregarEmpleado($nombre, $cargo, $correo, $contrasena, $estado) {
        $datos = compact("nombre","cargo","correo","contrasena","estado");
        return $this->enviarPeticion("POST", $this->apiUrl, $datos);
    }

    public function actualizarEmpleado($id, $nombre, $cargo, $correo, $estado) {
        $datos = compact("nombre","cargo","correo","estado");
        return $this->enviarPeticion("PUT", $this->apiUrl . "/$id", $datos);
    }

    public function eliminarEmpleado($id) {
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
