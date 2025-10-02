<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="container py-5 flex-grow-1">
    <h1 class="text-center mb-4 fw-bold">Agregar Proveedor</h1>

    <?php if (!empty($mensaje)) echo $mensaje; ?>


    <!-- Formulario -->
    <form action="../ModeloVistaControlador/index.php?Controller=proveedor&action=agregarProveedor" method="POST" class="shadow p-4 bg-white rounded">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Proveedor</label>
            <input type="text" id="nombre" name="Nombre_Empresa" class="form-control" placeholder="Ingrese el nombre" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" id="telefono" name="Telefono" class="form-control" placeholder="Ingrese el teléfono" required>
        </div>

        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" id="contacto" name="Contacto" class="form-control" placeholder="Ingrese el nombre del contacto" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" id="direccion" name="Direccion" class="form-control" placeholder="Ingrese la dirección" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" id="email" name="Correo" class="form-control" placeholder="ejemplo@correo.com">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
    </form>

    <!-- Botón Volver -->
    <div class="text-center mt-4">
        <a href="../ModeloVistaControlador/index.php?Controller=proveedor" class="btn btn-outline-secondary btn-lg w-50">
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
