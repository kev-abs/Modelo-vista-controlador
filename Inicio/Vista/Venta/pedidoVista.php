<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    <link rel="stylesheet" href="/./Inicio/./Vista/./Venta/./style.css">
</head>
<body>
    <h1>Lista de Pedidos</h1>    

    <?= $mensaje ?? '' ?>

    <?php if (is_array($Pedidos)): ?>
        <table class="tabla-pedidos">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>ID Cliente</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Pedidos as $pedido): ?>
                    <tr>
                        <td><?= htmlspecialchars($pedido["id_Pedido"]) ?></td>
                        <td><?= htmlspecialchars($pedido["id_Cliente"]) ?></td>
                        <td><?= htmlspecialchars($pedido["fecha_Pedido"]) ?></td>
                        <td><?= htmlspecialchars($pedido["estado"]) ?></td>
                        <td><?= htmlspecialchars($pedido["total"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color:red;">Error al obtener los Pedidos.</p>
    <?php endif; ?>

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

    <h3>Actualizar Pedido</h3>
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