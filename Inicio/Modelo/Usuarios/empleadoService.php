<?php
class EmpleadoService {
    private $apiUrl;

    public function __construct() {
        global $urlEmpleado;
        $this->apiUrl = $urlEmpleado;
    }

    private $jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhZG1pbiIsImlhdCI6MTc1OTI1MjYxNSwiZXhwIjoxNzU5MjU2MjE1fQ.TH1ovSG9IZyH9ZX-06qcPtEoAQ7NXF8MKcZO8zAMrZM";

    public function obtenerEmpleados() {

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
        
        $hash = password_hash($contrasena, PASSWORD_BCRYPT);

        $datos = [
            "nombre"     => $nombre,
            "cargo"      => $cargo,
            "correo"     => $correo,
            "contrasena" => $hash,
            "estado"     => $estado
        ];
        return $this->enviarPeticion("POST", $this->apiUrl, $datos);
    }

    public function actualizarEmpleado($id, $nombre, $cargo,$contrasena,  $correo, $estado) {
        
        $hash = password_hash($contrasena, PASSWORD_BCRYPT);

        $datos = [
            "nombre"     => $nombre,
            "cargo"      => $cargo,
            "correo"     => $correo,
            "contrasena" => $hash,
            "estado"     => $estado
        ];
        return $this->enviarPeticion("PUT", $this->apiUrl . "/$id", $datos);
    }

    public function eliminarEmpleado($id) {
        return $this->enviarPeticion("DELETE", $this->apiUrl . "/$id");
    }

    private function enviarPeticion($metodo, $url, $datos = null) {
        $proceso = curl_init($url);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, $metodo);
        if ($datos) curl_setopt($proceso, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            'Content-Length: ' . strlen($datos),
            "Athorization: Bearer{$this->jwtToken}"
        ]);

        $res = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        curl_close($proceso);

        return [
            "success" => ($http_code >= 200 && $http_code < 300),
            "error"   => ($http_code >= 200 && $http_code < 300) ? null : "HTTP $http_code",
            "response"=> $res
        ];
    }
}
