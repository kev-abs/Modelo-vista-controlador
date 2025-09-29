<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Envíos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

<!-- ENCABEZADO PANEL ADMIN -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="/ModeloVistaControlador/Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a href="../../../index.php?Controller=panel"text-decoration-none fs-7 fw-bold text-dark">K-SHOP | Admin</a>
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
              <li><a href="/ModeloVistaControlador/index.php?Controller=usuarios&action=consultarEmpleados" class="text-white text-decoration-none">➤ Consultar Empleados </a></li>
              <li><a href="/ModeloVistaControlador/index.php?Controller=usuarios&action=agregarEmpleado" class="text-white text-decoration-none">➤ Registrar Empleados</a></li>
              <li><a href="/ModeloVistaControlador/index.php?Controller=usuarios&action=editarEliminarEmpleado" class="text-white text-decoration-none">➤ Actualizar o Eliminar empleados</a></li>
              <li><a href="/ModeloVistaControlador/index.php?Controller=usuarios&action=consultarClientes" class="text-white text-decoration-none">➤ Consultar Clientes</a></li>
              <li><a href="/ModeloVistaControlador/index.php?Controller=usuarios&action=agregarCliente" class="text-white text-decoration-none">➤ Agregar Cliente</a></li>
              <li><a href="/ModeloVistaControlador/index.php?Controller=usuarios&action=editarEliminarCliente" class="text-white text-decoration-none">➤ Actualizar o Eliminar Cliente</a></li>
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
              <li><a href="../../../../index.php?Controller=ventas" class="text-white text-decoration-none">➤ Consultar Pedido</a></li>
              <li><a href="../../../../index.php?Controller=envios" class="text-white text-decoration-none">➤ Consultar Envío</a></li>
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

<main class="container my-5">
  <h1 class="mb-4">📦 Lista de Envíos</h1>

  <?= $mensaje ?? '' ?>

  <?php if (is_array($Envios)): ?>
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID Envío</th>
            <th>ID Pedido</th>
            <th>Dirección</th>
            <th>Fecha</th>
            <th>Método</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($Envios as $envio): ?>
            <tr>
              <td><?= htmlspecialchars($envio["id_Envio"]) ?></td>
              <td><?= htmlspecialchars($envio["id_Pedido"]) ?></td>
              <td><?= htmlspecialchars($envio["direccionEnvio"]) ?></td>
              <td><?= htmlspecialchars($envio["fechaEnvio"]) ?></td>
              <td><?= htmlspecialchars($envio["metodoEnvio"]) ?></td>
              <td><?= htmlspecialchars($envio["estadoEnvio"]) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-danger">Error al obtener los envíos.</div>
  <?php endif; ?>

  <!-- Formulario Agregar -->
  <div class="card mt-5">
    <div class="card-header bg-success text-white">Agregar Envío</div>
    <div class="card-body">
      <form method="POST" class="row g-3">
        <input type="hidden" name="accion" value="agregar">

        <div class="col-md-6">
          <label for="id_Pedido" class="form-label">ID Pedido</label>
          <input type="number" class="form-control" name="id_Pedido" id="id_Pedido" required>
        </div>
        <div class="col-md-6">
          <label for="direccionEnvio" class="form-label">Dirección</label>
          <input type="text" class="form-control" name="direccionEnvio" id="direccionEnvio" required>
        </div>
        <div class="col-md-6">
          <label for="fechaEnvio" class="form-label">Fecha</label>
          <input type="date" class="form-control" name="fechaEnvio" id="fechaEnvio" required>
        </div>
        <div class="col-md-6">
          <label for="metodoEnvio" class="form-label">Método</label>
          <input type="text" class="form-control" name="metodoEnvio" id="metodoEnvio" required>
        </div>
        <div class="col-md-12">
          <label for="estadoEnvio" class="form-label">Estado</label>
          <input type="text" class="form-control" name="estadoEnvio" id="estadoEnvio" required>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-success">Agregar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Formulario Actualizar -->
  <div class="card mt-4">
    <div class="card-header bg-warning">Actualizar Envío</div>
    <div class="card-body">
      <form method="POST" class="row g-3">
        <input type="hidden" name="accion" value="actualizar">

        <div class="col-md-4">
          <label for="id_Envio" class="form-label">ID Envío</label>
          <input type="number" class="form-control" name="id_Envio" id="id_Envio" required>
        </div>
        <div class="col-md-4">
          <label for="id_Pedido" class="form-label">ID Pedido</label>
          <input type="number" class="form-control" name="id_Pedido" id="id_Pedido" required>
        </div>
        <div class="col-md-4">
          <label for="direccionEnvio" class="form-label">Dirección</label>
          <input type="text" class="form-control" name="direccionEnvio" id="direccionEnvio" required>
        </div>
        <div class="col-md-6">
          <label for="fechaEnvio" class="form-label">Fecha</label>
          <input type="date" class="form-control" name="fechaEnvio" id="fechaEnvio" required>
        </div>
        <div class="col-md-6">
          <label for="metodoEnvio" class="form-label">Método</label>
          <input type="text" class="form-control" name="metodoEnvio" id="metodoEnvio" required>
        </div>
        <div class="col-md-12">
          <label for="estadoEnvio" class="form-label">Estado</label>
          <input type="text" class="form-control" name="estadoEnvio" id="estadoEnvio" required>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-warning">Actualizar</button>
        </div>
      </form>
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
</body>
</html>
