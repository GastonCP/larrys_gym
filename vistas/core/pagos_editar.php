<?php
// Verificar si el parámetro 'pagina' está presente en la URL y extraer el ID del pago
if (isset($_GET['pagina'])) {
    $rutas = explode('/', $_GET['pagina']);
    
    if (isset($rutas[1]) && is_numeric($rutas[1])) {
        $idPago = (int)$rutas[1]; // ID del pago
    } else {
        echo "No se especificó un ID válido.";
        exit;
    }
} else {
    echo "No se especificó un ID válido.";
    exit;
}

// Llamar al controlador para obtener los detalles del pago
$pago = ControladorPagos::ctrMostrarPago('id_pago', $idPago);  // 'id_pago' es el campo que identificará el pago
$planes = ControladorPagos::ctrMostrarPagosConPrecios('id_pago', $idPago);

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

        <!-- Información del pago -->
        <div class="mb-3">
            <label class="form-label"><strong>Cliente:</strong></label>
            <p><?php echo htmlspecialchars($pago["cliente_nombre"] . " " . $pago["cliente_apellido"]); ?></p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Fecha de Pago:</strong></label>
            <p><?php echo htmlspecialchars($planes["fecha_pago"]); ?></p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Monto:</strong></label>
            <p>$<?php echo htmlspecialchars(number_format($planes["monto"], 2)); ?></p>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Estado Actual:</strong></label>
            <p><?php echo ucfirst(htmlspecialchars($planes["estado"])); ?></p>
        </div>


        <!-- Botones de acción -->
        <form method="POST" action="">
            <button type="submit" name="confirmar_pago" class="btn btn-primary">Confirmar Pago</button>
            <a href="pagos.php" class="btn btn-secondary">Cancelar</a>
        </form>

        <?php
        // Manejo de la confirmación del pago
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_pago'])) {
            $estado = 'completado'; // Cambiar estado a completado

            // Llamar al controlador para actualizar el pago
            $actualizarPago = new ControladorPagos();
            $actualizarPago->ctrActualizarPago($idPago, $estado);

            // echo "<div class='alert alert-success mt-3'>El pago se ha marcado como completado.</div>";
        }
        ?>
    </div>
</body>
</html>
