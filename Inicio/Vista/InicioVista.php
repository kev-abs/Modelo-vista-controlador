<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - KSHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

  <!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a href="../../index.php" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="./Productos.php" class="nav-link text-dark">Productos</a>
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>
      <!-- CARRITO -->
      <a href="./carrito.php" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>

      <!-- INICIAR SESIÓN -->
      <a href="index.php?Controller=login" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main>
<!-- CARRUSEL -->
<div id="carouselKshop" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Inicio\Public\Imagenes\ropa caballero.jpeg" class="d-block w-100 object-fit-cover" alt="Caballeros" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Bienvenido a K-Shop</h2>
        <p class="text-light">¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Inicio\Public\Imagenes\ropa dama.jpg" class="d-block w-100 object-fit-cover" alt="Damas" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Moda femenina</h2>
        <p class="text-light">Tu estilo ideal está aquí</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Inicio\Public\Imagenes\ropa niño.jpg" class="d-block w-100 object-fit-cover" alt="Niños" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Moda infantil</h2>
        <p class="text-light">Para los más pequeños de casa</p>
      </div>
    </div>
  </div>
</div>

  <!-- INFORMACIÓN DESTACADA -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">¿Por qué elegirnos?</h2>
        <p class="text-muted">En K-Shop, tu satisfacción es nuestra prioridad</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <i class="bi bi-truck fs-1 text-warning"></i>
          <h5 class="mt-3">Envíos rápidos</h5>
          <p>Realizamos entregas el mismo día en zonas seleccionadas. Tu pedido llega cuando lo necesitas.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="bi bi-patch-check-fill fs-1 text-warning"></i>
          <h5 class="mt-3">Calidad garantizada</h5>
          <p>Productos seleccionados con altos estándares de calidad para que siempre luzcas increíble.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="bi bi-heart-fill fs-1 text-warning"></i>
          <h5 class="mt-3">Atención personalizada</h5>
          <p>Nuestro equipo está disponible para ayudarte a elegir lo mejor para ti o para regalar.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SOBRE NOSOTROS -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="Inicio\Public\Imagenes\tienda_cajera.jpg" class="img-fluid rounded shadow" alt="Nuestro equipo">
        </div>
        <div class="col-md-6">
          <h3 class="fw-bold">Sobre K-Shop</h3>
          <p>Somos una tienda de moda colombiana comprometida con la diversidad y el estilo. En K-Shop creemos que vestirse bien es una forma de expresar quiénes somos. Nos dedicamos a ofrecer ropa de excelente calidad a precios accesibles para todas las edades.</p>
          <p>Con más de 10 años en el mercado, hemos aprendido a escuchar a nuestros clientes y evolucionar con sus necesidades.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- ACCESO A MÓDULOS -->
  <section class="py-5 text-center">
    <div class="container">
      <h2 class="fw-bold mb-4">Accede a los módulos</h2>
      <div class="row g-3 justify-content-center">
        <?php if (!empty($modulos)): ?>
          <?php foreach ($modulos as $modulo): ?>
            <div class="col-md-3">
              <a href="<?= $modulo['ruta'] ?>" class="btn btn-dark w-100 py-3">
                <?= htmlspecialchars($modulo['label']) ?>
              </a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No hay módulos disponibles.</p>
        <?php endif; ?>
      </div>
      </div>
    </div>
  </section>
</main>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4 mt-auto">
  <div class="container">
    <p class="mb-1">&copy; 2025 K-SHOP - Todos los derechos reservados</p>
    <small>Desarrollado con PHP MVC + Bootstrap</small>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
