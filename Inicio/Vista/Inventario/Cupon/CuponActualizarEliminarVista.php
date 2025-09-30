<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar / Eliminar Cupón</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="container py-5  flex-grow-1">
  <h1 class="mb-4 text-center">Actualizar / Eliminar Cupón</h1>

  <!-- Actualizar -->
  <h2 class="mb-4 text-center">Actualizar Cupón</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="actualizar">
    <div class="row mb-3 justify-content-center">
      <div class="col-md-2">
        <label class="form-label">ID Cupón</label>
        <input type="number" class="form-control text-center" name="id_Cupon" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Código</label>
        <input type="text" class="form-control text-center" name="Codigo" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Descuento (%)</label>
        <input type="number" step="0.01" class="form-control text-center" name="Descuento" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Fecha Expiración</label>
        <input type="date" class="form-control text-center" name="Fecha_Expiracion" required>
      </div>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Cupón</button>
  </form>

  <!-- Eliminar -->
  <h2 class="mb-3 text-center">Eliminar Cupón</h2>
  <form method="POST" action="" class="text-center">
    <input type="hidden" name="accion" value="eliminar">
    <div class="row mb-3 justify-content-center">
      <div class="col-lg-4">
        <label class="form-label">ID Cupón</label>
        <input type="number" class="form-control text-center" name="id_Cupon" required>
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
