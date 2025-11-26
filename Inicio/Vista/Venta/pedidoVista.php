<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

<!-- ENCABEZADO PANEL ADMIN -->
<header class="bg-white sticky-top py-3 border-bottom shadow-sm">
  <div class="container d-flex flex-wrap justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="/ModeloVistaControlador/Inicio/Public/Imagenes/logo_kshopsinfondo.png" alt="Logo K-Shop" width="83" class="me-2">
      <a href="/ModeloVistaControlador/index.php?Controller=panel&action=manejarPeticion" class="text-decoration-none fs-7 fw-bold text-dark">K-SHOP | Admin</a>
    </div>
    <form class="mx-auto d-none d-md-block w-50" action="/buscar" method="GET">
      <input type="text" class="form-control" name="q" placeholder="Buscar en el panel...">
    </form>
    <nav class="d-flex align-items-center gap-3">
      <a href="/ModeloVistaControlador/Inicio/Controlador/Logueo/CerrarSesion.php" class="btn btn-outline-dark border-0 text-dark">
        Cerrar Sesión
      </a>
    </nav>
  </div>
</header>

<main class="container my-5">
  <h1 class="mb-4 text-center fw-bold">Gestión de Pedidos</h1>

  <?= $mensaje ?? '' ?>

  <?php if (is_array($Pedidos)): ?>
    <div class="table-responsive shadow-sm border rounded">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-dark">
          <tr>
            <th>ID Pedido</th>
            <th>ID Cliente</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Total</th>
            <th class="text-center">Acciones</th> 
          </tr>
        </thead>
        <tbody>
          <?php foreach ($Pedidos as $pedido): ?>
            <tr>
              <td><?= htmlspecialchars($pedido["id_Pedido"]) ?></td>
              <td><?= htmlspecialchars($pedido["id_Cliente"]) ?></td>
              <td><?= htmlspecialchars($pedido["fecha_Pedido"]) ?></td>
              <td><?= htmlspecialchars($pedido["estado"]) ?></td>
              <td>$<?= number_format($pedido["total"], 2) ?></td>
              <td class="text-center">
                <form method="POST" style="display:inline;">
                  <input type="hidden" name="accion" value="eliminar">
                  <input type="hidden" name="id_Pedido" value="<?= htmlspecialchars($pedido["id_Pedido"]) ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger"
                          onclick="return confirm('¿Seguro que quiere eliminar este pedido?');">
                    Eliminar
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-danger">Error al obtener los pedidos.</div>
  <?php endif; ?>

  <div class="row mt-5 g-4">

    <!-- Formulario Agregar -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secondary text-white fw-semibold">Agregar Pedido</div>
            <div class="card-body">
              <form method="POST" class="row g-3">
                <input type="hidden" name="accion" value="agregar">

                <div class="col-md-6">
                  <label for="id_Cliente" class="form-label">ID Cliente</label>
                  <input type="number" class="form-control border" name="id_Cliente" id="id_Cliente" required>
                </div>

                <div class="col-md-6">
                  <label for="fecha_Pedido" class="form-label">Fecha</label>
                  <input type="date" class="form-control border" name="fecha_Pedido" id="fecha_Pedido" required>
                </div>

                <div class="col-md-6">
                  <label for="estado" class="form-label">Estado</label>
                  <input type="text" class="form-control border" name="estado" id="estado" required>
                </div>

                <div class="col-md-6">
                  <label for="total" class="form-label">Total</label>
                  <input type="number" class="form-control border" name="total" id="total" required>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-secondary w-100">Guardar Pedido</button>
                </div>
              </form>
            </div>
        </div>
    </div>

    <!-- Formulario Actualizar -->
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secondary text-white fw-semibold">Actualizar Pedido</div>
            <div class="card-body">
              <form method="POST" class="row g-3">
                <input type="hidden" name="accion" value="actualizar">

                <div class="col-md-4">
                  <label for="id_Pedido" class="form-label">ID Pedido</label>
                  <input type="number" class="form-control border" name="id_Pedido" id="id_Pedido" required>
                </div>

                <div class="col-md-4">
                  <label for="id_Cliente" class="form-label">ID Cliente</label>
                  <input type="number" class="form-control border" name="id_Cliente" id="id_Cliente" required>
                </div>

                <div class="col-md-4">
                  <label for="fecha_Pedido" class="form-label">Fecha</label>
                  <input type="date" class="form-control border" name="fecha_Pedido" id="fecha_Pedido" required>
                </div>

                <div class="col-md-6">
                  <label for="estado" class="form-label">Estado</label>
                  <input type="text" class="form-control border" name="estado" id="estado" required>
                </div>

                <div class="col-md-6">
                  <label for="total" class="form-label">Total</label>
                  <input type="number" class="form-control border" name="total" id="total" required>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-secondary w-100">Actualizar Pedido</button>
                </div>
              </form>
            </div>
        </div>
    </div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
