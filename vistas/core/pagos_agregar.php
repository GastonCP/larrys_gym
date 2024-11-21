<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Registrar Nuevo Pago</h1>

        <!-- Formulario para agregar un nuevo pago -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-control" id="id_cliente" name="id_cliente" required>
                    <option value="" selected disabled>Seleccione un cliente</option>
                    <?php
                    // Obtener clientes desde la base de datos
                    $clientes = ControladorClientes::ctrMostrarClientes(null, null);
                    foreach ($clientes as $cliente) {
                        echo "<option value='{$cliente["id_cliente"]}'>{$cliente["nombre"]} {$cliente["apellido"]}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_pago" class="form-label">Fecha de Pago</label>
                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" required>
            </div>

            <div class="mb-3">
                <label for="monto" class="form-label">Monto ($)</label>
                <input type="number" class="form-control" id="monto" name="monto" step="0.01" min="0" required>
            </div>

            <div class="mb-3">
                <label for="metodo_pago" class="form-label">Método de Pago</label>
                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                    <option value="" selected disabled>Seleccione un método</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta de crédito">Tarjeta de Crédito</option>
                    <option value="transferencia bancaria">Transferencia Bancaria</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_plan" class="form-label">Plan Asociado (Opcional)</label>
                <select class="form-control" id="id_plan" name="id_plan">
                    <option value="" selected>Sin plan asociado</option>
                    <?php
                    // Obtener planes desde la base de datos
                    $planes = ControladorPlanes::ctrMostrarPlanes(null, null);
                    foreach ($planes as $plan) {
                        echo "<option value='{$plan["id_plan"]}'>{$plan["nombre_plan"]} - $ {$plan["precio"]}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_clase" class="form-label">Clase Asociada (Opcional)</label>
                <input type="number" class="form-control" id="id_clase" name="id_clase" min="1">
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="completado">Completado</option>
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado_cliente" class="form-label">Estado Cliente</label>
                <select class="form-control" id="estado_cliente" name="estado_cliente">
                    <option value="" selected>Sin estado definido</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Pago</button>
            <a href="<?php echo $url; ?>pagos" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    // Llamar al método del controlador para agregar el pago
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nuevoPago = new ControladorPagos();
        $nuevoPago->ctrAgregarPago($_POST);
    }
    ?>
</body>
</html>
