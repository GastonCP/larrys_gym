<?php
// Verificar si el parámetro 'pagina' está presente en la URL y extraer el ID del pago
if (isset($_GET['pagina'])) {
    $rutas = explode('/', $_GET['pagina']);
    
    if (isset($rutas[1]) && is_numeric($rutas[1])) {
        // Convertir explícitamente el valor a un entero
        $idPago = (int)$rutas[1]; // ID del pago
    } else {
        echo "No se especificó un ID válido.";
        exit;
    }
} else {
    echo "No se especificó un ID válido.";
    exit;
}

// Llamar al controlador para obtener el pago
$pago = ControladorPagos::ctrMostrarPago('id_pago', $idPago); // 'id_pago' es el campo que identificará el pago

// Verificar si el pago fue encontrado
if (!$pago) {
    echo "No se encontró el pago.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Pago</h1>

        <!-- Formulario para editar el pago -->
        <form method="POST" action="">

            <!-- Campo oculto para el ID del pago -->
            <input type="hidden" name="id_pago" value="<?php echo $pago["id_pago"]; ?>">

            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-control" id="id_cliente" name="id_cliente" required>
                    <?php
                    // Obtener clientes desde la base de datos
                    $clientes = ControladorClientes::ctrMostrarClientes(null, null);
                    foreach ($clientes as $cliente) {
                        $selected = $pago["id_cliente"] == $cliente["id_cliente"] ? "selected" : "";
                        echo "<option value='{$cliente["id_cliente"]}' {$selected}>{$cliente["nombre"]} {$cliente["apellido"]}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_pago" class="form-label">Fecha de Pago</label>
                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="<?php echo $pago["fecha_pago"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="monto" class="form-label">Monto ($)</label>
                <input type="number" class="form-control" id="monto" name="monto" value="<?php echo $pago["monto"]; ?>" step="0.01" min="0" required>
            </div>

            <div class="mb-3">
                <label for="metodo_pago" class="form-label">Método de Pago</label>
                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                    <option value="efectivo" <?php echo $pago["metodo_pago"] === "efectivo" ? "selected" : ""; ?>>Efectivo</option>
                    <option value="tarjeta de crédito" <?php echo $pago["metodo_pago"] === "tarjeta de crédito" ? "selected" : ""; ?>>Tarjeta de Crédito</option>
                    <option value="transferencia bancaria" <?php echo $pago["metodo_pago"] === "transferencia bancaria" ? "selected" : ""; ?>>Transferencia Bancaria</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="completado" <?php echo $pago["estado"] === "completado" ? "selected" : ""; ?>>Completado</option>
                    <option value="pendiente" <?php echo $pago["estado"] === "pendiente" ? "selected" : ""; ?>>Pendiente</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Pago</button>
            <a href="pagos" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    // Si se recibe el formulario, llamar al método para actualizar el pago
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $actualizarPago = new ControladorPagos();
        $actualizarPago->ctrEditarPago($_POST);  // Método para manejar la actualización
    }
    ?>
</body>
</html>
