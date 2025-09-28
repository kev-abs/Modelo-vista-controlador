<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-SHOP - Consultar Empleados</title>
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

    <!-- Título y descripción -->
    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2">Consulta de Empleados</h2>
        <p class="text-muted">
            Visualiza y analiza toda la información de tu equipo. Mantén un registro actualizado para mejorar la coordinación y la eficiencia en la tienda.
        </p>
    </div>

    <?= $mensaje ?? "" ?>

    <?php if (is_array($empleados) && count($empleados) > 0): ?>
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-dark text-white text-center rounded-top py-2">
                <h5 class="mb-0">
                <i class="bi bi-people-fill me-2"></i>Listado de Empleados
                </h5>
            </div>
            <div class="card-body bg-light p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle text-center">
                        <thead class="table-secondary">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Estado</th>
                                <th>Fecha Contratación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empleados as $e): ?>
                                <tr>
                                    <td><?= htmlspecialchars($e['ID_Empleado']) ?></td>
                                    <td><?= htmlspecialchars($e['Nombre']) ?></td>
                                    <td><?= htmlspecialchars($e['Cargo']) ?></td>
                                    <td><?= htmlspecialchars($e['Correo']) ?></td>
                                    <td><?= htmlspecialchars($e['Contrasena']) ?></td>
                                    <td><?= htmlspecialchars($e['Estado']) ?></td>
                                    <td><?= htmlspecialchars($e['Fecha_Contratacion']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center mt-4">
            No hay empleados registrados en este momento.
        </div>
    <?php endif; ?>

    <!-- Botón Volver -->
    <div class="text-center mt-5">
        <a href="/ModeloVistaControlador/index.php?Controller=usuarios" class="btn btn-outline-secondary btn-lg w-50">
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
