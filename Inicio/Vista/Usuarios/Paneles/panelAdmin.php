<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Bloqueo para evitar volver con "atrás"
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// Validación de sesión
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header("Location: /ModeloVistaControlador/index.php?Controller=login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K-SHOP - Panel Admin</title>

  <!-- Bootstrap y Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      background-color: #ffffff;
      color: #000000;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    .nav-link {
      color: #000000 !important;
      transition: background-color 0.3s, color 0.3s;
    }
    .nav-link:hover {
      color: #ffffff !important;
      background-color: #0d6efd;
      border-radius: 0.375rem;
    }
    .nav-link.text-warning:hover {
      background-color: #dc3545;
    }
    .logo-img {
      height: 40px;
      margin-right: 10px;
    }
    .carousel img {
      object-fit: cover;
      height: 500px;
      filter: brightness(85%);
    }
  </style>
</head>
<body>

<!-- ENCABEZADO PANEL ADMIN -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="/ModeloVistaControlador/Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a href="../../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP | Admin</a>
    </div>

    <!-- BARRA DE BÚSQUEDA -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar en el panel...">
    </form>

    <!-- BOTÓN CERRAR SESIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="/ModeloVistaControlador/Inicio/Controlador/Logueo/CerrarSesion.php" class="btn btn-outline-dark border-0 text-dark">
        Cerrar Sesión
      </a>
    </nav>
  </div>
</header>


<!-- MENÚ LATERAL OFFCANVAS -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="menuModulos">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Módulos</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div class="accordion accordion-flush" id="accordionModulos">

      <!-- Perfil -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" 
                  type="button" data-bs-toggle="collapse" data-bs-target="#modPerfil">
            👤 Perfil
          </button>
        </h2>
        <div id="modPerfil" class="accordion-collapse collapse" data-bs-parent="#accordionModulos">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li><a href="../perfiles/perfil_admin.php" class="text-white text-decoration-none">➤ Perfil de Administrador</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Usuarios -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" 
                  type="button" data-bs-toggle="collapse" data-bs-target="#modUsuarios">
            👥 Usuarios
          </button>
        </h2>
        <div id="modUsuarios" class="accordion-collapse collapse" data-bs-parent="#accordionModulos">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li><a href="../Barra de navegacion/registrar_vendedor.php" class="text-white text-decoration-none">➤ Registrar Vendedor</a></li>
              <li><a href="../php/consultar_vendedores.php" class="text-white text-decoration-none">➤ Consultar Vendedores</a></li>
              <li><a href="../php/consultar_clientes.php" class="text-white text-decoration-none">➤ Consultar Clientes</a></li>
              <li><a href="../php/listar_clientes.php" class="text-white text-decoration-none">➤ Agregar Cliente</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Productos -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" 
                  type="button" data-bs-toggle="collapse" data-bs-target="#modProductos">
            👕 Productos
          </button>
        </h2>
        <div id="modProductos" class="accordion-collapse collapse" data-bs-parent="#accordionModulos">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li><a href="../Barra de navegacion/Admin_productos.php" class="text-white text-decoration-none">➤ Consultar Productos</a></li>
              <li><a href="../Barra de navegacion/Admin_productos.php#formulario" class="text-white text-decoration-none">➤ Agregar Producto</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Inventario -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" 
                  type="button" data-bs-toggle="collapse" data-bs-target="#modInventario">
            📦 Inventario
          </button>
        </h2>
        <div id="modInventario" class="accordion-collapse collapse" data-bs-parent="#accordionModulos">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li><a href="../Inventario/consultar_inventario.php" class="text-white text-decoration-none">➤ Consultar Inventario</a></li>
              <li><a href="../Inventario/actualizar_inventario.php" class="text-white text-decoration-none">➤ Actualizar Inventario</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Ventas -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" 
                  type="button" data-bs-toggle="collapse" data-bs-target="#modVentas">
            🛒 Ventas
          </button>
        </h2>
        <div id="modVentas" class="accordion-collapse collapse" data-bs-parent="#accordionModulos">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li><a href="#" class="text-white text-decoration-none">➤ Consultar Ventas</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Reportes -->
      <div class="accordion-item bg-dark text-white">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" 
                  type="button" data-bs-toggle="collapse" data-bs-target="#modReportes">
            📊 Reportes
          </button>
        </h2>
        <div id="modReportes" class="accordion-collapse collapse" data-bs-parent="#accordionModulos">
          <div class="accordion-body">
            <ul class="list-unstyled">
              <li><a href="../reportes/estadisticas_ventas.php" class="text-white text-decoration-none">➤ Estadísticas de Ventas</a></li>
              <li><a href="../reportes/exportar_datos.php" class="text-white text-decoration-none">➤ Exportar Datos</a></li>
              <li><a href="../reportes/productos_mas_vendidos.php" class="text-white text-decoration-none">➤ Productos Más Vendidos</a></li>
              <li><a href="../reportes/clientes_frecuentes.php" class="text-white text-decoration-none">➤ Clientes Frecuentes</a></li>
              <li><a href="../reportes/bajo_inventario.php" class="text-white text-decoration-none">➤ Bajo Inventario</a></li>
              <li><a href="../reportes/efectividad_cupones.php" class="text-white text-decoration-none">➤ Uso de Cupones</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
  <div class="d-flex justify-content-start ps-3 py-2 border-bottom">
    <button class="d-flex justify-content-start ps-3 py-2 border-bottom navbar-toggler navbar-dark border-0 bg-dark p-2 rounded"
            type="button" data-bs-toggle="offcanvas" data-bs-target="#menuModulos"
            aria-controls="menuModulos">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>

<!-- INFORMACIÓN DEL PANEL -->
<main class="container my-5">
  <div class="row justify-content-center text-center">
    <div class="col-lg-10">
      <h2 class="mb-4">Bienvenido al Panel de Administración de K-SHOP</h2>
      <p class="lead text-muted">
        Este panel está diseñado para brindarte control total sobre la tienda. Desde la gestión de usuarios hasta el análisis detallado de ventas,
        aquí encontrarás todas las herramientas necesarias para que K-SHOP funcione de forma óptima y profesional.
      </p>
      <hr class="my-4" />

      <!-- Card Usuarios -->
      <div class="col">
        <a href="index.php?Controller=usuarios" class="text-decoration-none">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body">
              <h5 class="card-title">
                <i class="bi bi-people-fill text-primary me-2"></i>Usuarios
              </h5>
              <p class="card-text">Registra, consulta y administra clientes y empleados de la tienda.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Card Productos -->
      <div class="col">
        <a href="index.php?Controller=productos" class="text-decoration-none">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body">
              <h5 class="card-title">
                <i class="bi bi-bag-check text-success me-2"></i>Productos
              </h5>
              <p class="card-text">Administra el catálogo, actualiza información y controla inventario.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Card Inventario -->
      <div class="col">
        <a href="index.php?Controller=inventario" class="text-decoration-none">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body">
              <h5 class="card-title">
                <i class="bi bi-box-seam text-warning me-2"></i>Inventario
              </h5>
              <p class="card-text">Consulta el inventario en tiempo real y mantén actualizada la disponibilidad.</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Card Ventas -->
      <div class="col">
        <a href="index.php?Controller=ventas" class="text-decoration-none">
          <div class="card h-100 border-start border-5 border-warning shadow-sm">
            <div class="card-body">
              <h5 class="card-title">
                <i class="bi bi-cart4 text-danger me-2"></i>Ventas
              </h5>
              <p class="card-text">Accede a estadísticas de ventas y controla promociones y cupones.</p>
            </div>
          </div>
        </a>
      </div>


      <div class="alert alert-light mt-5 border-start border-5 border-success shadow-sm">
        <h4 class="alert-heading">💡 ¡Tu rol importa!</h4>
        <p class="mb-0">Como administrador, eres el motor que impulsa el crecimiento de K-SHOP. Cada decisión cuenta. ¡Haz que cada clic construya una mejor tienda!</p>
      </div>
    </div>
  </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <div class="mb-3">
      <a href="#" class="text-white me-3">Términos y condiciones</a>
      <a href="#" class="text-white me-3">Política de privacidad</a>
      <a href="#" class="text-white me-3">Ayuda</a>
    </div>
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Funciones/funciones.js" defer></script>
</body>
</html>
