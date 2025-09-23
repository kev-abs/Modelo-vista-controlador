<?php
require_once __DIR__ . '/../Modelo/clienteService.php';

class ClienteController {
    private $clienteService;

    public function __construct() {
        $this->clienteService = new ClienteService();
    }

    public function manejarPeticion() {
        $mensaje = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre     = trim($_POST["nombre"] ?? '');
            $correo     = trim($_POST["correo"] ?? '');
            $contrasena = trim($_POST["contrasena"] ?? '');
            $documento = trim($POST["documento"] ?? '');
            $telefono = trim($POST["telefono"] ?? '' );

            if (!empty($nombre) && !empty($correo) && !empty($contrasena) && !empty($documento) && !empty($telefono)) {
                $resultado = $this->clienteService->agregarCliente($nombre, $correo, $contrasena, $documento, $telefono);

                if ($resultado["success"]) {
                    $mensaje = "<p class='text-success text-center'>Usuario agregado correctamente.</p>";
                } else {
                    $mensaje = "<p class='text-danger text-center'>Error: " . htmlspecialchars($resultado["error"] ?? 'desconocido') . "</p>";
                }
            } else {
                $mensaje = "<p class='text-danger text-center'>Todos los campos son obligatorios.</p>";
            }
        }

        $clientes = $this->clienteService->obtenerClientes();

        require __DIR__ . '/../vista/clientes.php';
    }
}
