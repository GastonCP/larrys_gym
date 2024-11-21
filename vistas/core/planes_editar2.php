<?php
// Verificar si el parámetro 'id' está presente y es un valor numérico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idPlan = $_GET['id'];
    var_dump($idPlan);  // Muestra el valor del ID, debería ser int(1)
} else {
    // Si no se especifica un ID válido, mostramos un mensaje de error
    echo "No se especificó un ID válido.";
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
            <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">

            <div class="mb-3">
                <label for="nombre_plan" class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="nombre_plan" name="nombre_plan" value="<?php echo $plan["nombre_plan"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (Meses)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" value="<?php echo $plan["duracion"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="sesiones" class="form-label">Sesiones por Semana</label>
                <input type="number" class="form-control" id="sesiones" name="sesiones" value="<?php echo $plan["sesiones"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio ($)</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $plan["precio"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $plan["descripcion"]; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Plan</button>
            <a href="planes" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    // Llamar al método del controlador para actualizar el plan
    $actualizarPlan = new ControladorPlanes();
    $actualizarPlan->ctrEditarPlan();
    ?>
</body>
</html>
