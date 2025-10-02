<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Ingreso de Compra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="container py-5 flex-grow-1">
  <h1 class="text-center mb-4 fw-bold">Agregar Ingreso de Compra</h1>

    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-info text-center"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST" action="" class="text-center">
        <input type="hidden" name="accion" value="agregar">
        <div class="row mb-3 justify-content-center">
            <div class="col-md-3">
                <label for="id_Empleado" class="form-label">Empleado</label>
                <input type="number" class="form-control text-center" name="id_Empleado" required>
            </div>
            <div class="col-md-3">
                <label for="id_Proveedor" class="form-label">Proveedor</label>
                <input type="number" class="form-control text-center" name="id_Proveedor" required>
            </div>
            <div class="col-md-3">
                <label for="total" class="form-label">Total</label>
                <input type="text" class="form-control text-center" name="total" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Agregar Ingreso</button>
    </form>

    <div class="text-center mt-4">
        <a href="../ModeloVistaControlador/index.php?Controller=inventario" class="btn btn-outline-secondary btn-lg w-50">
        <i class="bi bi-arrow-left me-2"></i> Volver al Panel
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
