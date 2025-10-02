<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- ENCABEZADO -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">

    <!-- LOGO -->
    <div class="d-flex align-items-center">
      <img src="/ModeloVistaControlador/Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" height="" class="me-2">
      <a href="/ModeloVistaControlador/index.php?Controller=inicio" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP</a>
    </div>

    <!-- BARRA DE BÚSQUEDA CENTRADA (invisible en móvil) -->
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar productos...">
    </form>

    <!-- MENÚ NAVEGACIÓN -->
    <nav class="d-flex align-items-center gap-3">
      <a href="index.php?Controller=productos&action=verProductos" class="nav-link text-dark">Productos</a>
      <a href="./servicios.php" class="nav-link text-dark">Servicios</a>
      <!-- CARRITO -->
      <a href="index.php?Controller=carrito&action=mostrar" class="btn btn-outline-dark border-0">
        <i class="bi bi-cart-fill"></i>
      </a>

      <!-- INICIAR SESIÓN -->
      <a href="index.php?Controller=login" class="btn btn-outline-dark border-0 text-dark">
        <i class="bi bi-person-circle me-1"></i>Iniciar Sesión
      </a>
    </nav>
  </div>
</header>

<div class="container mt-5">
    <h2 class="mb-4"><i class="bi bi-cart"></i>Tu Carrito</h2>

    <?php if (!empty($carrito)): ?>
        <div class="row g-4">
            <?php 
            $total = 0;
            foreach ($carrito as $item): 
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <?php if (!empty($item['imagen'])): ?>
                        <img src="<?= htmlspecialchars($item['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['nombre']) ?>" style="height:200px; object-fit:cover;">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/200x200.png?text=Producto" class="card-img-top" alt="Producto">
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($item['nombre']) ?></h5>
                        <p class="card-text mb-1">Precio: <strong>$<?= number_format($item['precio'], 0, ',', '.') ?></strong></p>
                        <p class="card-text mb-1">Cantidad: <strong><?= $item['cantidad'] ?></strong></p>
                        <p class="card-text text-success">Subtotal: $<?= number_format($subtotal, 0, ',', '.') ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="index.php?Controller=carrito&action=eliminar&id=<?= $item['id'] ?>" 
                           class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Eliminar</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        
        <div class="mt-5 p-4 bg-white rounded shadow-sm">
            <h4 class="mb-3">Resumen de tu compra</h4>
            <p class="fs-5">Total a pagar: <strong>$<?= number_format($total, 0, ',', '.') ?></strong></p>
            <div class="d-flex gap-2">
                <a href="index.php?Controller=carrito&action=vaciar" class="btn btn-warning">
                    <i class="bi bi-x-circle"></i> Vaciar carrito
                </a>
                <a href="index.php?Controller=pedido&action=checkout" class="btn btn-success">
                    <i class="bi bi-credit-card"></i> Finalizar compra
                </a>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-info text-center">
            <i class="bi bi-cart-x"></i> Tu carrito está vacío
        </div>
    <?php endif; ?>
</div>

</body>
</html>
