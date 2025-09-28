<?php

class InicioController {
    private $modelo;
    public function index() {
        require __DIR__ . '/../Vista/inicioVista.php';
    }

    public function manejarPeticion() {

        require __DIR__ . "/../Vista/inicioVista.php";
    }
}
