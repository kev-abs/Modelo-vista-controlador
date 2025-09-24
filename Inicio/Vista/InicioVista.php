<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - KSHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <div class="d-flex align-items-center">
      <img src="Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a class="navbar-brand fw-bold fs-4 text-dark">K-SHOP</a>
    </div>
    <nav class="nav nav-pills">
      <a class="nav-link text-dark" href="#">Inicio</a>
      <a class="nav-link text-dark" href="#">Nosotros</a>
      <a class="nav-link text-dark" href="#">Contacto</a>
    </nav>
  </div>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main>
  <!-- CARRUSEL -->
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Imagenes/banner1.jpg" class="d-block w-100" alt="Banner 1">
      </div>
      <div class="carousel-item">
        <img src="Imagenes/banner2.jpg" class="d-block w-100" alt="Banner 2">
      </div>
      <div class="carousel-item">
        <img src="Imagenes/banner3.jpg" class="d-block w-100" alt="Banner 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
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
