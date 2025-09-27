<?php
session_start();

class PanelController {

    public function manejarPeticion() {
        // Verificar si hay sesión iniciada
        if (!isset($_SESSION['rol'])) {
            header("Location: /ModeloVistaControlador/index.php?Controller=login&action=mostrarFormulario");
            exit();
        }

        // Dependiendo del rol, cargar la vista adecuada
        switch ($_SESSION['rol']) {
            case 'administrador':
                require_once __DIR__ . '../../../../Vista/Usuarios/Paneles/panelAdmin.php';
                break;

            case 'cliente':
                require_once __DIR__ . 'Inicio\Vista\Usuarios\Paneles\panelCliente.php';
                break;

            case 'vendedor':
                require_once __DIR__ . 'Inicio\Vista\Usuarios\Paneles\panelVendedor.php';
                break;

            default:
                // Si el rol no es válido, cerrar sesión por seguridad
                session_unset();
                session_destroy();
                header("Location: index.php?Controller=login&action=mostrarFormulario");
                exit();
        }
    }
}
