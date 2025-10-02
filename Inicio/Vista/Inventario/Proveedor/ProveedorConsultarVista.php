<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Proveedores </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (para iconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="container py-5 flex-grow-1">
    <!-- Título principal -->
    <h2 class="text-center mb-4">Listado de Proveedores</h2>
    <p class="text-center text-muted">
        Consulta todos los proveedores registrados en K-SHOP de manera clara y organizada.
    </p>

    <!-- Encabezado -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <i class="fas fa-truck"></i> Proveedores Registrados
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if (!empty($proveedores)): ?>
                        <?php foreach ($proveedores as $prov): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($prov['id_Proveedor']); ?></td>
                                <td><?php echo htmlspecialchars($prov['nombre_empresa']); ?></td>
                                <td><?php echo htmlspecialchars($prov['contacto']); ?></td>
                                <td><?php echo htmlspecialchars($prov['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($prov['correo']); ?></td>
                                <td><?php echo htmlspecialchars($prov['direccion']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay proveedores registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botón para volver al panel -->
    <div class="text-center mt-4">
        <a href="../ModeloVistaControlador/index.php?Controller=inventario" class="btn btn-outline-secondary btn-lg w-50">
        <i class="bi bi-arrow-left me-2"></i> Volver al Panel
        </a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
