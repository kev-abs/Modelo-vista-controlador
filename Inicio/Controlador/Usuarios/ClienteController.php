<?php
require_once __DIR__ . "/../../Modelo/Usuarios/clienteService.php";
require_once __DIR__ . "/../../Confi/Confi.php";

class ClienteController {
    private $clienteService;

    public function __construct() {
        $this->clienteService = new ClienteService();
    }

    public function index() {
        require __DIR__ . '/../../Vista/Usuarios/ClienteVista.php';
    }

    public function manejarPeticion() {
        $mensaje = "";
        $clientes = $this->clienteService->obtenerClientes();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? "";

            $idCliente = trim($_POST['id_Cliente'] ?? "");
            $nombre    = trim($_POST['nombre'] ?? "");
            $correo    = trim($_POST['correo'] ?? "");
            $contrasena= trim($_POST['contrasena'] ?? "");
            $documento = trim($_POST['documento'] ?? "");
            $telefono  = trim($_POST['telefono'] ?? "");
            $estado    = trim($_POST['estado'] ?? "");

            if ($accion === "agregar") {
                if ($nombre && $correo && $contrasena) {
                    $resultado = $this->clienteService->agregarCliente($nombre, $correo, $contrasena, $documento, $telefono, $estado);
                    $mensaje = $resultado['success']
                        ? "<div class='alert alert-success'>Cliente agregado correctamente.</div>"
                        : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
                } else {
                    $mensaje = "<div class='alert alert-danger'>Los campos nombre, correo y contraseña son obligatorios.</div>";
                }
            }

            if ($accion === "actualizar") {
                if ($idCliente && $nombre && $correo) {
                    $resultado = $this->clienteService->actualizarCliente($idCliente, $nombre, $correo, $telefono, $documento, $estado);
                    $mensaje = $resultado['success']
                        ? "<div class='alert alert-success'>Cliente actualizado correctamente.</div>"
                        : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
                } else {
                    $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios para actualizar.</div>";
                }
            }

            if ($accion === "eliminar") {
                if ($idCliente) {
                    $resultado = $this->clienteService->eliminarCliente($idCliente);
                    $mensaje = $resultado['success']
                        ? "<div class='alert alert-success'>Cliente eliminado correctamente.</div>"
                        : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
                } else {
                    $mensaje = "<div class='alert alert-danger'>El ID del cliente es obligatorio para eliminar.</div>";
                }
            }
        }
        $clientes = $this->clienteService->obtenerClientes();
        $mensaje  = $mensaje ?? "";
        require __DIR__ . '/../../Vista/Usuarios/ClienteVista.php';

    }

}
