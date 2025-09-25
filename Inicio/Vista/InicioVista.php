<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - KSHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    main {
      flex: 1;
    }
  </style>
</head>
<body>

  <!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="../Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
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
      <img src="../Public/Imagenes/ropa caballero.jpeg" class="d-block w-100 object-fit-cover" alt="Caballeros" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Bienvenido a K-Shop</h2>
        <p class="text-light">¡Donde puedes encontrar tus gustos sin tanto andar!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../Public/Imagenes/ropa dama.jpg" class="d-block w-100 object-fit-cover" alt="Damas" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Moda femenina</h2>
        <p class="text-light">Tu estilo ideal está aquí</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../Public/Imagenes/ropa niño.jpg" class="d-block w-100 object-fit-cover" alt="Niños" style="height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-light text-shadow">Moda infantil</h2>
        <p class="text-light">Para los más pequeños de casa</p>
      </div>
    </div>
  </div>
</div>

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
