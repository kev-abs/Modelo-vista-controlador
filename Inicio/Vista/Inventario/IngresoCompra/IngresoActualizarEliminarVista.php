<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar o Eliminar Ingreso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="container py-5 flex-grow-1">
  <h1 class="text-center mb-4 fw-bold">Actualizar o Eliminar Ingreso</h1>

  <?php if (!empty($mensaje)): ?>
    <div class="alert alert-info text-center"><?= $mensaje ?></div>
  <?php endif; ?>

  <!-- Actualizar -->
  <h2 class="mb-3 text-center">Actualizar ingreso</h2>
  <form method="POST" action="" class="text-center mb-5">
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
    <button type="submit" class="btn btn-warning">Actualizar</button>
  </form>

  <!-- Eliminar -->
  <h2 class="mb-3 text-center">Eliminar ingreso</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="eliminar">
    <div class="row mb-3 justify-content-center">
      <div class="col-md-4">
        <label for="id_Ingreso" class="form-label">ID Ingreso</label>
        <input type="number" class="form-control text-center" name="id_Ingreso" required>
      </div>
    </div>
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>

  <div class="text-center mt-4">
    <a href="../ModeloVistaControlador/index.php?Controller=inventario" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Volver al Panel
    </a>
  </div>
</div>
 <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <div class="mb-3">
            <a href="#" class="text-white me-3">Términos</a>
            <a href="#" class="text-white me-3">Privacidad</a>
            <a href="#" class="text-white">Ayuda</a>
            </div>
            <p class="mb-0">&copy; 2025 Tienda K-Shop - Todos los derechos reservados</p>
        </div>
    </footer>

</body>
</html>
