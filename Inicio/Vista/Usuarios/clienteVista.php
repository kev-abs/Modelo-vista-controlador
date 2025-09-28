<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>K-SHOP - Gestión de Clientes</title>

    <!-- Bootstrap y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

<!-- HEADER -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <div class="d-flex align-items-center">
        <img src="Inicio\Public\Imagenes\logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
        <a href="/ModeloVistaControlador/index.php?Controller=panel&action=manejarPeticion"
        class="text-decoration-none fs-7 fw-bold text-dark">
        K-SHOP | Admin
        </a>
    </div>

    <nav class="d-flex align-items-center gap-3">
        <a href="Inicio\Controlador\Logueo\CerrarSesion.php" class="btn btn-outline-dark border-0 text-dark">
        Cerrar Sesión
        </a>
    </nav>
    </div>
</header>

<main class="container my-5">

    <h1 class="text-center mb-5">Gestión de Clientes</h1>

    <!-- Mensaje -->
    <?= $mensaje ?? "" ?>

    <!-- Tabla de Clientes -->
    <?php if (is_array($clientes) && count($clientes) > 0): ?>
        <div class="table-responsive mb-5">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-primary">
            <tr>
                <th>ID</th><th>Nombre</th><th>Correo</th><th>Contraseña</th>
                <th>Documento</th><th>Teléfono</th><th>Estado</th><th>Fecha Registro</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clientes as $c): ?>
                <tr>
                <td><?= htmlspecialchars($c['ID_Cliente']) ?></td>
                <td><?= htmlspecialchars($c['Nombre']) ?></td>
                <td><?= htmlspecialchars($c['Correo']) ?></td>
                <td><?= htmlspecialchars($c['Contrasena']) ?></td>
                <td><?= htmlspecialchars($c['Documento']) ?></td>
                <td><?= htmlspecialchars($c['Telefono']) ?></td>
                <td><?= htmlspecialchars($c['Estado']) ?></td>
                <td><?= htmlspecialchars($c['Fecha_Registro']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">No hay clientes registrados.</div>
    <?php endif; ?>

    <!-- Formulario de Clientes -->
    <div class="row g-4">

        <!-- Agregar Cliente -->
        <div class="col-lg-6">
        <div class="card card-custom shadow-sm p-4">
            <h4 class="mb-3 text-center">Agregar Cliente</h4>
            <form method="POST" class="row g-3">
            <input type="hidden" name="accion" value="agregar">
            <div class="col-md-4"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
            <div class="col-md-4"><input type="email" name="correo" class="form-control" placeholder="Correo" required></div>
            <div class="col-md-4"><input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required></div>
            <div class="col-md-4"><input type="text" name="documento" class="form-control" placeholder="Documento"></div>
            <div class="col-md-4"><input type="text" name="telefono" class="form-control" placeholder="Teléfono"></div>
            <div class="col-12 text-center"><button type="submit" class="btn btn-dark w-50">Agregar</button></div>
            </form>
        </div>
        </div>

        <!-- Actualizar Cliente -->
        <div class="col-lg-6">
        <div class="card card-custom shadow-sm p-4">
            <h4 class="mb-3 text-center">Actualizar Cliente</h4>
            <form method="POST" class="row g-3">
            <input type="hidden" name="accion" value="actualizar">
            <div class="col-md-4"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
            <div class="col-md-4"><input type="email" name="correo" class="form-control" placeholder="Correo" required></div>
            <div class="col-md-4"><input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required></div>
            <div class="col-md-4"><input type="text" name="documento" class="form-control" placeholder="Documento"></div>
            <div class="col-md-4"><input type="text" name="telefono" class="form-control" placeholder="Teléfono"></div>
            <div class="col-md-4"><input type="text" name="estado" class="form-control" placeholder="Estado"></div>
            <div class="col-12 text-center"><button type="submit" class="btn btn-dark w-50">Actualizar</button></div>
            </form>
        </div>
        </div>

        <!-- Eliminar Cliente -->
        <div class="col-12">
        <div class="card card-custom shadow-sm p-4">
            <h4 class="mb-3 text-center">Eliminar Cliente</h4>
            <form method="POST" class="row g-3 justify-content-center">
            <input type="hidden" name="accion" value="eliminar">
            <div class="col-md-3"><input type="number" name="id_Cliente" class="form-control" placeholder="ID Cliente" required></div>
            <div class="col-12 text-center"><button type="submit" class="btn btn-dark w-25">Eliminar</button></div>
            </form>
        </div>
        </div>

    </div>

    <!-- Botón Volver -->
    <div class="text-center mt-5">
        <a href="../Paneles/paneladmin.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver al Panel
        </a>
    </div>

    </main>

    <!-- FOOTER -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>