<?php
// InicioController.php
require_once __DIR__ . "/../Modelo/inicioService.php";

class InicioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloInicio();
    }

    public function manejarPeticion() {
        $modulos = $this->modelo->obtenerModulos();

        if (isset($_GET['modulo'])) {
            $ruta = $this->modelo->obtenerRuta($_GET['modulo']);
            if ($ruta) {
                header("Location: " . $ruta);
                exit;
            }
        }

        require __DIR__ . "/../Vista/inicioVista.php";
    }
}
