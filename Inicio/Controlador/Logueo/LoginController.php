<?php
require_once __DIR__ . "../../../Modelo/Logueo/VerificarUsuarios.php";

class LoginController {
    public function mostrarFormulario() {
        require "./Inicio/Vista/Logueo/IniciarSesion.php";
    }

    public function manejarPeticion() {
        session_start();
        include __DIR__ . "/../../Conexion/Conexion.php";

        $usuarioModel = new VerificarUsuarios($conexion);

        $correo = trim($_POST["correo"]);
        $contrasena = $_POST["contrasena"];

        // --- 1. Cliente ---
        $cliente = $usuarioModel->loginCliente($correo);
        if ($cliente && password_verify($contrasena, $cliente["Contrasena"])) {
            $_SESSION["id_cliente"] = $cliente["ID_Cliente"];
            $_SESSION["nombre"] = $cliente["Nombre"];
            $_SESSION["rol"] = "cliente";
            header("Location: ./Inicio/Vista/Usuarios/Paneles/panelCliente.php");
            exit();
        }

        // --- 2. Empleado ---
        $empleado = $usuarioModel->loginEmpleado($correo);
        if ($empleado) {
            $cargo = strtolower(trim($empleado["Cargo"]));

            if ($cargo === "vendedor") {
                // Vendedor → contraseña cifrada
                if (password_verify($contrasena, $empleado["Contrasena"])) {
                    $_SESSION["id_empleado"] = $empleado["ID_Empleado"];
                    $_SESSION["nombre"] = $empleado["Nombre"];
                    $_SESSION["rol"] = "vendedor";
                    header("Location: ./Inicio/Vista/Usuarios/Paneles/panelVendedor.php");
                    exit();
                }
            } elseif ($cargo === "administrador") {
                // Administrador → contraseña texto plano
                if ($contrasena === $empleado["Contrasena"]) {
                    $_SESSION["id_empleado"] = $empleado["ID_Empleado"];
                    $_SESSION["nombre"] = $empleado["Nombre"];
                    $_SESSION["rol"] = "administrador";
                    header("Location: ./Inicio/Vista/Usuarios/Paneles/panelAdmin.php");
                    exit();
                }
            } else {
                echo "<script>alert('Rol no reconocido.'); window.history.back();</script>";
                exit();
            }
        }

        // --- 3. Ningún login válido ---
        echo "<script>alert('Correo o contraseña incorrectos.'); window.history.back();</script>";
    }
}
