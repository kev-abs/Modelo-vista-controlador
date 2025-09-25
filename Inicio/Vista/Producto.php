<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>    

    <?= $mensaje ?? '' ?>

    <?php if (isset($productos) && is_array($productos)): ?>
        <ul></ul>
        <?php foreach ($productos as $producto): ?>
            <li><?=htmlspecialchars($producto["nombre"]??(string)$producto)?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
        <p class="text-center mt-5">Error al obtener los clientes</p>
    <?php endif; ?>

    <!-- Formulario Agregar -->
    <h2>Agregar nuevo Producto</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="agregar">

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="descripcion">Descripción</label><br>
        <textarea name="descripcion" id="descripcion" required></textarea><br><br>

        <label for="precio">Precio</label><br>
        <input type="number" name="precio" id="precio" required><br><br>

        <label for="stock">Stock</label><br>
        <input type="number" name="stock" id="stock" required><br><br>

        <label for="id_Proveedor">ID del Proveedor</label><br>
        <input type="number" name="id_Proveedor" id="id_Proveedor" required><br><br>

        <label for="estado">Estado</label><br>
        <select name="estado" id="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>
        
        <label for="imagen">Imagen (opcional)</label><br>
        <input type="file" name="imagen" id="imagen"><br><br>

        <button type="submit">Agregar Producto</button>
    </form>

    <!-- Formulario Actualizar -->
    <h2>Actualizar Producto</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="actualizar">

        <label for="id_Producto">ID del Producto</label><br>
        <input type="number" name="id_Producto" id="id_Producto" required><br><br>

        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="descripcion">Descripción</label><br>
        <textarea name="descripcion" id="descripcion" required></textarea><br><br>

        <label for="precio">Precio</label><br>
        <input type="number" name="precio" id="precio" required><br><br>

        <label for="stock">Stock</label><br>
        <input type="number" name="stock" id="stock" required><br><br>

        <label for="id_Proveedor">ID del Proveedor</label><br>
        <input type="number" name="id_Proveedor" id="id_Proveedor" required><br><br>

        <label for="estado">Estado</label><br>
        <select name="estado" id="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>

        <label for="imagen">Imagen (opcional)</label><br>
        <input type="file" name="imagen" id="imagen"><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
