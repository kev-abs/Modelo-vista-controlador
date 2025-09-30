<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consultar Ingresos de Compra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
    <h1 class="text-center mb-4 fw-bold">Lista de Ingresos de Compra</h1>

    <?php if (isset($ingresos) && is_array($ingresos) && count($ingresos) > 0): ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-warning">
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
        <div class="alert alert-warning text-center">
        <i class="bi bi-exclamation-triangle-fill"></i> No hay ingresos registrados.
        </div>
    <?php endif; ?>

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
