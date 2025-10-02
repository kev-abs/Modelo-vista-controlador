<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consultar Cupones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <div class="container py-5 flex-grow-1">
    <h1 class="mb-4 text-center">Consultar Cupones</h1>

    <?php if (isset($mensaje) && !empty($mensaje)): ?>
        <div class="alert alert-info text-center"><?= $mensaje ?></div>
    <?php endif; ?>

    <?php if (isset($cupones) && is_array($cupones) && count($cupones) > 0): ?>
        <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-info">
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

    <!-- Botón Volver -->
    <div class="text-center mt-4">
        <a href="../ModeloVistaControlador/index.php?Controller=proveedor" class="btn btn-outline-secondary btn-lg w-50">
            <i class="bi bi-arrow-left me-2"></i> Volver al Panel
        </a>
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
