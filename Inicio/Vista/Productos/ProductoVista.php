<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>K-SHOP - Módulo Productos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/ModeloVistaControlador/index.php?Controller=panel&action=manejarPeticion">
                <img src="/ModeloVistaControlador/Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="K-Shop" width="60" class="me-2">
                K-SHOP | Admin
            </a>

            <form class="d-none d-md-flex mx-auto w-50" role="search">
                <input class="form-control" type="search" placeholder="Buscar en productos..." aria-label="Buscar">
            </form>

            <div class="d-flex">
                <a href="/ModeloVistaControlador/Inicio/Controlador/Logueo/CerrarSesion.php" class="btn btn-outline-dark">
                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                </a>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Módulo de Productos</h2>
            <p class="text-muted">
                Desde aquí podrás gestionar el <strong>inventario</strong> y las <strong>categorías</strong> de productos en K-SHOP.
            </p>
        </div>

        <div class="row g-4">
            <!-- Card Productos -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-box-seam fs-1 text-primary mb-3"></i>
                        <h4 class="fw-bold">Gestión de Productos</h4>
                        <p class="text-muted">
                            Registra, consulta y actualiza productos de la tienda.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/ModeloVistaControlador/index.php?Controller=producto&action=consultarProductos" class="btn btn-outline-dark">
                                <i class="bi bi-search"></i> Consultar
                            </a>
                            <a href="/ModeloVistaControlador/index.php?Controller=producto&action=agregarProducto" class="btn btn-outline-dark">
                                <i class="bi bi-plus-circle"></i> Agregar
                            </a>
                            <a href="/ModeloVistaControlador/index.php?Controller=producto&action=actualizarProducto"  class="btn btn-outline-dark">
                            <i class="bi bi-pencil-square"></i> Actualizar
                            </a>

                        </div>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
