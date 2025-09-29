<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-SHOP - Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
            <span class="fw-bold text-dark">K-SHOP | Admin</span>
        </div>
        <nav>
            <a href="Inicio/Controlador/Logueo/CerrarSesion.php" class="btn btn-outline-dark">Cerrar Sesión</a>
        </nav>
    </div>
</header>

<main class="container my-5">

    <!-- Título -->
    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2">Gestión de Productos</h2>
        <p class="text-muted">Consulta, agrega y actualiza productos de manera organizada y sencilla.</p>
    </div>

    <?= $mensaje ?? "" ?>

    <!-- Botón agregar producto -->
    <div class="text-end mb-4">
        <a href="/ModeloVistaControlador/index.php?Controller=producto&action=agregarProducto" class="btn btn-success">
            <i class="bi bi-plus-circle me-2"></i>Agregar Producto
        </a>
    </div>

    <!-- Tabla de productos -->
    <?php if (!empty($productos) && is_array($productos)): ?>
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-header bg-dark text-white text-center rounded-top py-2">
                <h5 class="mb-0"><i class="bi bi-box-seam me-2"></i>Listado de Productos</h5>
            </div>
            <div class="card-body bg-light p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle text-center mb-0">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>ID Proveedor</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($productos as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p['id_Producto'] ?? '') ?></td>
                                <td><?= htmlspecialchars($p['nombre'] ?? '') ?></td>
                                <td><?= htmlspecialchars($p['descripcion'] ?? '') ?></td>
                                <td>$<?= htmlspecialchars($p['precio'] ?? '') ?></td>
                                <td><?= htmlspecialchars($p['stock'] ?? '') ?></td>
                                <td><?= htmlspecialchars($p['id_Proveedor'] ?? '') ?></td>
                                <td>
                                    <?php if (!empty($p['imagen'])): ?>
                                        <img src="Inicio/Public/Imagenes_productos/<?= htmlspecialchars($p['imagen']) ?>" width="80" alt="Producto">
                                    <?php else: ?>
                                        <span class="text-muted">Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($p['estado'] ?? '') ?></td>
                                <td>
                                    <a href="/ModeloVistaControlador/index.php?Controller=producto&action=actualizarProducto&id=<?= $p['id_Producto'] ?>" 
                                       class="btn btn-sm btn-dark">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center mt-4 shadow-sm">
            No hay productos registrados aún. ¡Agrega nuevos productos para comenzar a gestionar!
        </div>
    <?php endif; ?>

    <div class="text-center mt-5">
        <a href="/ModeloVistaControlador/index.php?Controller=panel" class="btn btn-outline-secondary btn-lg w-50">
            <i class="bi bi-arrow-left me-2"></i>Volver
        </a>
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

</body>
</html>
