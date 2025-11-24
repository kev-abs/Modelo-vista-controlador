<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Ingresos de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center" href="/ModeloVistaControlador/index.php?Controller=panel&action=manejarPeticion">
                <img src="Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
                <span class="fw-bold text-dark">K-SHOP | Compras</span>
            </div>
            <nav>
                <a href="Inicio/Controlador/Logueo/CerrarSesion.php" class="btn btn-outline-dark">Cerrar Sesión</a>
            </nav>
        </div>
</header>
<main>
    <div class="container py-5  flex-grow-1">
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
        <a href="../ModeloVistaControlador/index.php?Controller=inventario" class="btn btn-outline-secondary btn-lg w-50">
        <i class="bi bi-arrow-left me-2"></i> Volver al Panel
        </a>
    </div>
    </div>
</main>
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
