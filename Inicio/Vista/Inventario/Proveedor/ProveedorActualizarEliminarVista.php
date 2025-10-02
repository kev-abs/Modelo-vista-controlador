<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar o Eliminar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<div class="container py-5 flex-grow-1">
    <div class="card shadow">
        <div class="card-header bg-dark text-white text-center">
            <h3>Actualizar o Eliminar Proveedor</h3>
        </div>
        <div class="card-body">

            <!-- Formulario de Actualización -->
            <form method="POST" action="index.php?Controller=inventario&action=actualizarProveedor">
                <input type="hidden" name="ID_Proveedor" value="<?php echo $proveedor['ID_Proveedor'] ?? ''; ?>">

                <div class="mb-3">
                    <label class="form-label">Empresa</label>
                    <input type="text" name="nombre_empresa" class="form-control" 
                           value="<?php echo $proveedor['nombre_empresa'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contacto</label>
                    <input type="text" name="contacto" class="form-control" 
                           value="<?php echo $proveedor['contacto'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" 
                           value="<?php echo $proveedor['telefono'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" 
                           value="<?php echo $proveedor['correo'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control" 
                           value="<?php echo $proveedor['direccion'] ?? ''; ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Actualizar
                    </button>
                </div>
            </form>

            <hr>

             <h2 class="mb-3 text-center">Eliminar Proveedor</h2>
              <form method="POST" action="" class="text-center">
                <input type="hidden" name="accion" value="eliminar">
                <div class="row mb-3 justify-content-center">
                  <div class="col-lg-4">
                    <label class="form-label">ID Proveedor</label>
                    <input type="number" class="form-control text-center" name="id_Proveedor" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>

        </div>
    </div>

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
