<?php
require_once __DIR__ . "/../../Modelo/Usuarios/clienteService.php";
require_once __DIR__ . "/../../Modelo/Usuarios/empleadoService.php";
require_once __DIR__ . "/../../Confi/Confi.php";

class UsuariosController {
    private $clienteService;
    private $empleadoService;

    public function __construct() {
        $this->clienteService = new ClienteService();
        $this->empleadoService = new EmpleadoService();
    }

    public function index() {
        require __DIR__ . '/../../Vista/Usuarios/usuarioVista.php';
    }

    // ================= CLIENTES =================
    public function consultarClientes() {
        $clientes = $this->clienteService->obtenerClientes();
        require __DIR__ . '/../../Vista/Usuarios/Cliente/ClienteConsultarVista.php';
    }

    public function agregarCliente() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? "");
            $correo = trim($_POST['correo'] ?? "");
            $contrasena = trim($_POST['contrasena'] ?? "");
            $documento = trim($_POST['documento'] ?? "");
            $telefono = trim($_POST['telefono'] ?? "");
            $estado = trim($_POST['estado'] ?? "");

            if ($nombre && $correo && $contrasena) {
                $resultado = $this->clienteService->agregarCliente($nombre, $correo, $contrasena, $documento, $telefono, $estado);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Cliente agregado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Campos obligatorios vacíos.</div>";
            }
        }
        require __DIR__ . '/../../Vista/Usuarios/Cliente/ClienteAgregarVista.php';
    }

    public function editarEliminarCliente() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? "";
            $idCliente = trim($_POST['id_Cliente'] ?? "");
            $nombre = trim($_POST['nombre'] ?? "");
            $correo = trim($_POST['correo'] ?? "");
            $contrasena = trim($_POST['contrasena'] ?? "");
            $documento = trim($_POST['documento'] ?? "");
            $telefono = trim($_POST['telefono'] ?? "");
            $estado = trim($_POST['estado'] ?? "");

            if ($accion === "actualizar" && $idCliente && $nombre && $correo) {
                $resultado = $this->clienteService->actualizarCliente($idCliente, $nombre, $correo,  $contrasena, $telefono, $documento, $estado);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Cliente actualizado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            }

            if ($accion === "eliminar" && $idCliente) {
                $resultado = $this->clienteService->eliminarCliente($idCliente);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Cliente eliminado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            }
        }
        require __DIR__ . '/../../Vista/Usuarios/Cliente/ClienteActualizarEliminarVista.php';
    }

    // ================= EMPLEADOS =================
    public function consultarEmpleados() {
        $empleados = $this->empleadoService->obtenerEmpleados();
        require __DIR__ . '/../../Vista/Usuarios/Empleado/EmpleadoConsultarVista.php';
    }

    public function agregarEmpleado() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? "");
            $cargo = trim($_POST['cargo'] ?? "");
            $correo = trim($_POST['correo'] ?? "");
            $contrasena = trim($_POST['contrasena'] ?? "");
            $estado = trim($_POST['estado'] ?? "");

            if ($nombre && $cargo && $correo && $contrasena) {
                $resultado = $this->empleadoService->agregarEmpleado($nombre, $cargo, $correo, $contrasena, $estado);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Empleado agregado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Campos obligatorios vacíos.</div>";
            }
        }
        require __DIR__ . '/../../Vista/Usuarios/Empleado/EmpleadoAgregarVista.php';
    }

    public function editarEliminarEmpleado() {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? "";
            $idEmpleado = trim($_POST['id_Empleado'] ?? "");
            $nombre = trim($_POST['nombre'] ?? "");
            $cargo = trim($_POST['cargo'] ?? "");
            $correo = trim($_POST['correo'] ?? "");
            $estado = trim($_POST['estado'] ?? "");

            if ($accion === "actualizar" && $idEmpleado && $nombre && $correo) {
                $resultado = $this->empleadoService->actualizarEmpleado($idEmpleado, $nombre, $cargo, $correo, $estado);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Empleado actualizado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            }

            if ($accion === "eliminar" && $idEmpleado) {
                $resultado = $this->empleadoService->eliminarEmpleado($idEmpleado);
                $mensaje = $resultado['success']
                    ? "<div class='alert alert-success'>Empleado eliminado correctamente.</div>"
                    : "<div class='alert alert-danger'>Error: {$resultado['error']}</div>";
            }
        }
        require __DIR__ . '/../../Vista/Usuarios/Empleado/EmpleadoActualizarEliminarVista.php';
    }
}
