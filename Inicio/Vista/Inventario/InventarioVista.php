<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Gestión de Inventario</h1>
    <p class="text-center text-muted">Selecciona un submódulo para gestionar:</p>

    <div class="row justify-content-center">
        <!-- Submódulo Ingreso de Compras -->
        <div class="col-md-4 mb-3">
            <div class="card shadow rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Ingreso de Compras</h5>
                    <p class="card-text">Registrar y consultar compras a proveedores.</p>
                   <a href="../../index.php?Controller=inventario&action=ingresoCompra" class="btn btn-primary">Abrir</a>
                </div>
            </div>
        </div>

        <!-- Submódulo Cupones -->
        <div class="col-md-4 mb-3">
            <div class="card shadow rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Cupones</h5>
                    <p class="card-text">Gestionar descuentos y promociones.</p>
                    <a href="../../index.php?Controller=inventario&action=cupon" class="btn btn-success">Abrir</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
