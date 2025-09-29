<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Cupones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .tabla-cupones th {
      background-color: #17a2b8;
      color: white;
      border: 2px solid black;
      text-align: center;
      padding: 12px;
    }
    .tabla-cupones td {
      border: 2px solid black;
      text-align: center;
      padding: 10px;
    }
    .tabla-cupones tr:nth-child(even) { background-color: #fff; }
    .tabla-cupones tr:hover { background-color: #d1ecf1; }
    h1, h2 { font-weight: bold; color: #343a40; text-align: center; }
  </style>
</head>
<body class="bg-light">

<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="../Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>
    <nav class="d-flex align-items-center gap-3">
      <a href="../php/cerrarsesion.php" class="nav-link">
        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
      </a>
    </nav>
  </div>
</header>

<div class="container py-5">
  <h1 class="mb-4">Gestión de Cupones</h1>

  <!-- Mensajes -->
  <?php if (isset($mensaje) && !empty($mensaje)): ?>
      <div class="alert alert-info text-center"><?= $mensaje ?></div>
  <?php endif; ?>

  <!-- Tabla de cupones -->
  <?php if (isset($cupones) && is_array($cupones) && count($cupones) > 0): ?>
    <div class="table-responsive">
      <table class="tabla-cupones w-100">
        <thead>
          <tr>
            <th>ID Cupón</th>
            <th>Código</th>
            <th>Descuento (%)</th>
            <th>Fecha Expiración</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cupones as $cupon): ?>
            <tr>
              <td><?= htmlspecialchars($cupon['id_Cupon'] ?? '-') ?></td>
              <td><?= htmlspecialchars($cupon['codigo'] ?? '-') ?></td>
              <td><?= htmlspecialchars($cupon['descuento'] ?? '0') ?>%</td>
              <td><?= htmlspecialchars($cupon['fecha_expiracion'] ?? '-') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-warning text-center">
      <i class="bi bi-exclamation-triangle-fill"></i> No hay cupones registrados.
    </div>
  <?php endif; ?>
</div>

<!-- FORMULARIO AGREGAR -->
<div class="container mt-5">
  <h2>Agregar Cupón</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="agregar">
    <div class="row mb-3 justify-content-center">
      <div class="col-md-3">
        <label for="Codigo" class="form-label">Código</label>
        <input type="text" class="form-control text-center" name="Codigo" required>
      </div>
      <div class="col-md-3">
        <label for="Descuento" class="form-label">Descuento (%)</label>
        <input type="number" step="0.01" class="form-control text-center" name="Descuento" required>
      </div>
      <div class="col-md-3">
        <label for="Fecha_Expiracion" class="form-label">Fecha Expiración</label>
        <input type="date" class="form-control text-center" name="Fecha_Expiracion" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Cupón</button>
  </form>
</div>

<!-- FORMULARIO ACTUALIZAR -->
<div class="container mt-5">
  <h2>Actualizar Cupón</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="actualizar">
    <div class="row mb-3 justify-content-center">
      <div class="col-md-2">
        <label for="id_Cupon" class="form-label">ID Cupón</label>
        <input type="number" class="form-control text-center" name="id_Cupon" required>
      </div>
      <div class="col-md-3">
        <label for="Codigo" class="form-label">Código</label>
        <input type="text" class="form-control text-center" name="Codigo" required>
      </div>
      <div class="col-md-3">
        <label for="Descuento" class="form-label">Descuento (%)</label>
        <input type="number" step="0.01" class="form-control text-center" name="Descuento" required>
      </div>
      <div class="col-md-3">
        <label for="Fecha_Expiracion" class="form-label">Fecha Expiración</label>
        <input type="date" class="form-control text-center" name="Fecha_Expiracion" required>
      </div>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Cupón</button>
  </form>
</div>

<!-- FORMULARIO ELIMINAR -->
<div class="container mt-5">
  <h2>Eliminar Cupón</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="eliminar">
    <div class="row mb-3 justify-content-center">
      <div class="col-lg-4">
        <label for="id_Cupon" class="form-label">ID Cupón</label>
        <input type="number" class="form-control text-center" name="id_Cupon" required>
      </div>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>
</div>

<div class="text-center mt-4">
  <a href="../Paneles/paneladmin.php" class="btn btn-secondary">
    <i class="bi bi-arrow-left"></i> Volver al Panel
  </a>
</div>

<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
