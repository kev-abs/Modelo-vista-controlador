<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Envios</title>
    <link rel="stylesheet" href="/./Inicio/./Vista/./Venta/./style.css">
</head>
<body>
    <h1>Lista de Envios</h1>    

    <?= $mensaje ?? '' ?>

    <?php if (is_array($Envios)): ?>
        <table class="tabla-pedidos">
            <thead>
                <tr>
                    <th>ID Envío</th>
                    <th>ID Pedido</th>
                    <th>Dirección</th>
                    <th>Fecha de Envío</th>
                    <th>Método</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Envios as $envio): ?>
                    <tr>
                        <td><?= htmlspecialchars($envio["id_Envio"]) ?></td>
                        <td><?= htmlspecialchars($envio["id_Pedido"]) ?></td>
                        <td><?= htmlspecialchars($envio["direccion_Envio"]) ?></td>
                        <td><?= htmlspecialchars($envio["fecha_Envio"]) ?></td>
                        <td><?= htmlspecialchars($envio["metodo_Envio"]) ?></td>
                        <td><?= htmlspecialchars($envio["estado_Envio"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color:red;">Error al obtener los Envios.</p>
    <?php endif; ?>

    <h3>Agregar Envio</h3>
    <form method="POST">
        <input type="hidden" name="accion" value="agregar">

        <label for="id_Envio">ID del Envío</label><br>
        <input type="number" name="id_Envio" id="id_Envio" required>
        <br><br>

        <label for="id_Pedido">ID del Pedido</label><br>
        <input type="number" name="id_Pedido" id="id_Pedido" required>
        <br><br>

        <label for="direccion_Envio">Dirección del Envío</label><br>
        <input type="text" name="direccion_Envio" id="direccion_Envio" required>
        <br><br>

        <label for="fecha_Envio">Fecha del Envío</label><br>
        <input type="date" name="fecha_Envio" id="fecha_Envio" required>
        <br><br>

        <label for="metodo_Envio">Método de Envío</label><br>
        <input type="text" name="metodo_Envio" id="metodo_Envio" required>
        <br><br>

        <label for="estado_Envio">Estado del Envío</label><br>
        <input type="text" name="estado_Envio" id="estado_Envio" required>
        <br><br>

        <button type="submit">Agregar Envío</button>
    </form>

    <h3>Actualizar Envío</h3>
    <form method="POST">
        <input type="hidden" name="accion" value="actualizar">

        <label for="id_Envio">ID del Envío</label><br>
        <input type="number" name="id_Envio" id="id_Envio" required><br><br>

        <label for="id_Pedido">ID del Pedido</label><br>
        <input type="number" name="id_Pedido" id="id_Pedido" required><br><br>

        <label for="direccion_Envio">Dirección del Envío</label><br>
        <input type="text" name="direccion_Envio" id="direccion_Envio" required><br><br>

        <label for="fecha_Envio">Fecha del Envío</label><br>
        <input type="date" name="fecha_Envio" id="fecha_Envio" required><br><br>

        <label for="metodo_Envio">Método de Envío</label><br>
        <input type="text" name="metodo_Envio" id="metodo_Envio" required><br><br>

        <label for="estado_Envio">Estado del Envío</label><br>
        <input type="text" name="estado_Envio" id="estado_Envio" required><br><br>

        <button type="submit">Actualizar Envío</button>
    </form>
</body>
</html>