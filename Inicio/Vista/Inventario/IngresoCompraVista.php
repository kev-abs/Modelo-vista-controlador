<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ingresos de Compra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      color: #000;
    }
    .tabla-ingresos th {
      background-color: #ffc107;
      color: black;
      border: 2px solid black;
      text-align: center;
      padding: 12px;
    }
    .tabla-ingresos td {
      border: 2px solid black;
      text-align: center;
      padding: 10px;
    }
    .tabla-ingresos tr:nth-child(even) {
      background-color: #fff;
    }
    .tabla-ingresos tr:hover {
      background-color: #ffeeba;
    }
    h1 {
      font-weight: bold;
      color: #343a40;
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body class="bg-light">

 <!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">

      <!-- CERRAR SESIÓN-->
      <a href="../php/cerrarsesion.php" class="nav-link">
            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
          </a>
    </nav>
  </div>
</header>

<div class="container py-5">
  <h1 class="text-center mb-4 fw-bold">Lista de Ingresos de Compra</h1>

  <?php if (is_array($ingresos) && count($ingresos) > 0): ?>
    <div class="table-responsive">
      <table class="tabla-ingresos w-100">
        <thead>
          <tr>
            <th>ID Ingreso</th>
            <th>ID Empleado</th>
            <th>ID Proveedor</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ingresos as $ingreso): ?>
            <tr>
              <td><?= htmlspecialchars($ingreso['id_Ingreso'] ?? '-') ?></td>
              <td><?= htmlspecialchars($ingreso['id_Empleado'] ?? '-') ?></td>
              <td><?= htmlspecialchars($ingreso['id_Proveedor'] ?? '-') ?></td>
              <td>$ <?= htmlspecialchars($ingreso['total'] ?? '0.00') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning text-center shadow-sm">
      <i class="bi bi-exclamation-triangle-fill"></i> No hay ingresos registrados.
    </div>
  <?php endif; ?>

  <div class="text-center mt-4">
    <a href="../Paneles/paneladmin.php" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Volver al Panel
    </a>
  </div>
</div>

<div class="container mt-5">
  <h2 class="mb-3 text-center">Actualizar ingreso existente</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="actualizar">
    <div class="row mb-3 justify-content-center">
      <div class="col-md-2">
        <label for="id_Ingreso" class="form-label">ID Ingreso</label>
        <input type="number" class="form-control text-center" name="id_Ingreso" required>
      </div>
      <div class="col-md-2">
        <label for="id_Empleado" class="form-label">Empleado</label>
        <input type="number" class="form-control text-center" name="id_Empleado" required>
      </div>
      <div class="col-md-2">
        <label for="id_Proveedor" class="form-label">Proveedor</label>
        <input type="number" class="form-control text-center" name="id_Proveedor" required>
      </div>
      <div class="col-md-2">
        <label for="total" class="form-label">Total</label>
        <input type="text" class="form-control text-center" name="total" required>
      </div>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Ingreso</button>
  </form>
</div>

<div class="container mt-5">
  <h2 class="mb-3 text-center">Eliminar ingreso</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="eliminar">
    <div class="row mb-3 justify-content-center">
      <div class="col-lg-4">
        <label for="id_Ingreso" class="form-label">ID Ingreso</label>
        <input type="number" class="form-control text-center" name="id_Ingreso" required>
      </div>
    </div>
  </form>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
