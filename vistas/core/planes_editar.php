<?php
// Verificar si el parámetro 'pagina' está presente en la URL y extraer el ID del plan
if (isset($_GET['pagina'])) {
    $rutas = explode('/', $_GET['pagina']);
    
    if (isset($rutas[1]) && is_numeric($rutas[1])) {
        // Convertir explícitamente el valor a un entero
        $idPlan = (int)$rutas[1]; // ID del plan
    } else {
        echo "No se especificó un ID válido.";
        exit;
    }
} else {
    echo "No se especificó un ID válido.";
    exit;
}

// Llamar al controlador para obtener el plan
$plan = ControladorPlanes::ctrMostrarPlan('id_plan', $idPlan);  // 'id_plan' es el campo que identificará el plan

// Verificar si el plan fue encontrado
if (!$plan) {
    echo "No se encontró el plan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Plan de Entrenamiento</h1>

        <!-- Formulario para editar el plan -->
        <form method="POST" action="">

            <!-- Campo oculto para el ID del plan -->
            <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">

            <div class="mb-3">
                <label for="nombre_plan" class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="nombre_plan" name="nombre_plan" value="<?php echo htmlspecialchars($plan["nombre_plan"]); ?>" required>
            </div>

            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (Meses)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" value="<?php echo htmlspecialchars($plan["duracion"]); ?>" required>
            </div>

            <div class="mb-3">
                <label for="sesiones" class="form-label">Sesiones por Semana</label>
                <input type="number" class="form-control" id="sesiones" name="sesiones" value="<?php echo htmlspecialchars($plan["sesiones"]); ?>" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio ($)</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($plan["precio"]); ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo htmlspecialchars($plan["descripcion"]); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Plan</button>
            <a href="planes" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    // Si se recibe el formulario, llamar al método para actualizar el plan
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $actualizarPlan = new ControladorPlanes();
        $actualizarPlan->ctrEditarPlan();  // Aquí deberías manejar la actualización
    // }
    ?>
</body>
</html>
