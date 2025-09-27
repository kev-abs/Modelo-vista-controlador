<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="/./Inicio/./Vista/./Productos/./styles.css">
</head>
<body>
    <h1>Lista de Productos</h1>

    <?= $mensaje ?? '' ?>

    <?php if (!empty($productos) && is_array($productos)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Descripción</th>
                    <th>Precio</th><th>Stock</th>
                    <th>ID Proveedor</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                <tr>
                    <?php foreach (['id_Producto','nombre','descripcion','precio','stock','id_Proveedor','estado'] as $campo): ?>
                        <td><?= htmlspecialchars($p[$campo] ?? '') ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron productos.</p>
    <?php endif; ?>

    <!-- Formulario Agregar -->
    <h2>Agregar nuevo Producto</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="accion" value="agregar">
        <label>Nombre</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Descripción</label><br>
        <textarea name="descripcion" required></textarea><br><br>

        <label>Precio</label><br>
        <input type="number" name="precio" required><br><br>

        <label>Stock</label><br>
        <input type="number" name="stock" required><br><br>

        <label>ID Proveedor</label><br>
        <input type="number" name="id_Proveedor" required><br><br>

        <label>Estado</label><br>
        <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>

        <label>Imagen (opcional)</label><br>
        <input type="file" name="imagen"><br><br>

        <button type="submit">Agregar Producto</button>
    </form>

    <!-- Formulario Actualizar -->
    <h2>Actualizar Producto</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="accion" value="actualizar">
        <label>ID del Producto</label><br>
        <input type="number" name="id_Producto" required><br><br>

        <label>Nombre</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Descripción</label><br>
        <textarea name="descripcion" required></textarea><br><br>

        <label>Precio</label><br>
        <input type="number" name="precio" required><br><br>

        <label>Stock</label><br>
        <input type="number" name="stock" required><br><br>

        <label>ID Proveedor</label><br>
        <input type="number" name="id_Proveedor" required><br><br>

        <label>Estado</label><br>
        <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>

        <label>Imagen (opcional)</label><br>
        <input type="file" name="imagen"><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
