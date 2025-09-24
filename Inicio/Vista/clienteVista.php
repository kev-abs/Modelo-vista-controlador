<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center mt-5">Lista de Clientes</h1>

    <?=$mensaje ?? '' ?>

    <?php if (is_array($clientes)): ?>
        <ul>
            <?php foreach ($clientes as $cliente): ?>
                <li><?=htmlspecialchars($cliente["nombre"]??(string)$cliente)?></li>

            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-center mt-5">Error al obtener los clientes</p>
    <?php endif; ?>

    <h2 class="text-center mt-5">Agregar nuevo cliente</h2>

    <form method="POST" class="p-4 border rounded bg-white shadow-sm">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del cliente</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo del cliente</label>
            <input type="email" name="correo" id="correo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña del cliente</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="documento" class="form-label">Documento del cliente</label>
            <input type="text" name="documento" id="documento" class="form-control" required>
        </div>

        <div>
            <label for="telefono" class="form-label">Telefono del cliente</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-dark w-100">Agregar Cliente</button>
    </form>
</div>
</body>
</html>