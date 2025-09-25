<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresos de Compra</title>
</head>
<body>
    <h1>Lista de Ingresos</h1>

    <?php if (is_array($ingresos)) : ?>
        <ul>
            <?php foreach ($ingresos as $ingreso): ?>
                <li><?= htmlspecialchars((string)$ingreso) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p style="color:red;">Error al obtener los ingresos.</p>
    <?php endif; ?>

    <h2>Registrar nuevo ingreso</h2>

    <form method="POST" action="">
        <label for="id_Empleado">Empleado:</label><br>
        <input type="number" name="id_Empleado" id="id_Empleado" required><br><br>

        <label for="id_Proveedor">Proveedor:</label><br>
        <input type="number" name="id_Proveedor" id="id_Proveedor" required><br><br>

        <label for="total">Total:</label><br>
        <input type="text" name="total" id="total" required><br><br>

        <input type="submit" value="Agregar Ingreso">
    </form>

    <h3>Actualizar ingreso existente</h3>
    <form method="POST" action="">
        <label for="id_Ingreso">ID Ingreso:</label><br>
        <input type="number" name="id_Ingreso" id="id_Ingreso" required><br><br>

        <label for="id_Empleado">Empleado:</label><br>
        <input type="number" name="id_Empleado" id="id_Empleado" required><br><br>

        <label for="id_Proveedor">Proveedor:</label><br>
        <input type="number" name="id_Proveedor" id="id_Proveedor" required><br><br>

        <label for="total">Total:</label><br>
        <input type="text" name="total" id="total" required><br><br>

        <input type="submit" value="Actualizar Ingreso">
</body>
</html>
