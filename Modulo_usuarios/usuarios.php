<?php
require_once __DIR__ . '/ControladorUsuarios/ClienteController.php';

$controller = new ClienteController();
$controller->manejarPeticion();