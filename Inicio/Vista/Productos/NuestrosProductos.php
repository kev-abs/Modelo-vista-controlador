<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Productos - K-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        /* Animación de aparición */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Botones hover */
        .btn-hover:hover {
            transform: translateY(-3px);
            transition: transform 0.3s;
        }

        /* Animación de zoom al click */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .product-card.zoomed {
            transform: scale(1.1);
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            position: relative;
        }
    </style>
</head>
<body class="bg-light">

<!-- Botón volver al inicio -->
<div class="container my-4 text-center">
    <a href="index.php" class="btn btn-outline-secondary btn-lg btn-hover">
        <i class="bi bi-arrow-left me-2"></i>Volver al inicio
    </a>
</div>

<?php if (!empty($productos) && is_array($productos)): ?>
<div class="container my-5">
    <h2 class="text-center mb-5 fw-bold text-shadow">Nuestros Productos</h2>
    <div class="row g-4">
        <?php foreach ($productos as $p): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 fade-in">
            <div class="card h-100 shadow-sm border-0 rounded-3 product-card">
                <?php if(!empty($p['imagen'])): ?>
                <img src="Inicio/Public/Imagenes_productos/<?= htmlspecialchars($p['imagen']) ?>" 
                     class="card-img-top img-fluid rounded-top" 
                     alt="<?= htmlspecialchars($p['nombre']) ?>">
                <?php else: ?>
                <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                    <span class="text-muted">Sin imagen</span>
                </div>
                <?php endif; ?>
                <div class="card-body text-center d-flex flex-column">
                    <h5 class="card-title fw-bold"><?= htmlspecialchars($p['nombre']) ?></h5>
                    <p class="card-text text-muted small"><?= htmlspecialchars($p['descripcion']) ?></p>
                    <p class="fw-bold h6">$<?= htmlspecialchars($p['precio']) ?></p>
                    <a href="#" class="btn btn-primary mt-auto btn-hover">
                        <i class="bi bi-cart-plus me-1"></i>Agregar al carrito
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php else: ?>
<div class="container my-5">
    <div class="alert alert-warning text-center shadow-sm">
        No hay productos disponibles.
    </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Animación de zoom al hacer click
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
        card.addEventListener('click', () => {
            // Quita la clase zoomed de otras cards
            cards.forEach(c => c.classList.remove('zoomed'));
            // Añade la clase zoomed a la card clickeada
            card.classList.add('zoomed');
        });
    });

    // Clic fuera de la card para quitar zoom
    document.body.addEventListener('click', e => {
        if (!e.target.closest('.product-card')) {
            cards.forEach(c => c.classList.remove('zoomed'));
        }
    });
</script>
</body>
</html>
