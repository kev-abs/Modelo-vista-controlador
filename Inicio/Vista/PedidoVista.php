<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
</head>
<body>
    <h1>Lista de Pedidos</h1>    

    <?= $mensaje ?? '' ?>

    <?php if (is_array($Pedidos)): ?>
        <ul>
            <?php foreach ($Pedidos as $pedido): ?>
                <li>
                    <?= htmlspecialchars($pedido["id_Pedido"]) ?> |
                    <?= htmlspecialchars($pedido["id_Cliente"]) ?> |
                    <?= htmlspecialchars($pedido["fecha_Pedido"]) ?> |
                    <?= htmlspecialchars($pedido["estado"]) ?> |
                    <?= htmlspecialchars($pedido["total"]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p style="color:red;">Error al obtener los Pedidos.</p>
    <?php endif; ?>

    <!-- Formulario Agregar -->
    <h2>Agregar nuevo Pedido</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="agregar">

        <label for="id_Cliente">ID del Cliente</label><br>
        <input type="number" name="id_Cliente" id="id_Cliente" required>
        <br><br>

        <label for="fecha_Pedido">Fecha del Pedido</label><br>
        <input type="date" name="fecha_Pedido" id="fecha_Pedido" required>
        <br><br>

        <label for="estado">Estado</label><br>
        <input type="text" name="estado" id="estado" required>
        <br><br>

        <label for="total">Total</label><br>
        <input type="number" name="total" id="total" required>
        <br><br>

        <button type="submit">Agregar Pedido</button>
    </form>

    <!-- Formulario Actualizar -->
    <h2>Actualizar Pedido</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="actualizar">

        <label for="id_Pedido">ID del Pedido</label><br>
        <input type="number" name="id_Pedido" id="id_Pedido" required><br><br>

        <label for="id_Cliente">ID del Cliente</label><br>
        <input type="number" name="id_Cliente" id="id_Cliente" required><br><br>

        <label for="fecha_Pedido">Fecha del Pedido</label><br>
        <input type="date" name="fecha_Pedido" id="fecha_Pedido" required><br><br>

        <label for="estado">Estado</label><br>
        <input type="text" name="estado" id="estado" required><br><br>

        <label for="total">Total</label><br>
        <input type="number" name="total" id="total" required><br><br>

        <button type="submit">Actualizar Pedido</button>
    </form>
</body>
</html>