<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Modificar Plan de Entrenamiento</h1>
        
        <?php
        // Obtener el ID del plan desde la URL
        if (isset($_GET["id_plan"])) {
            $id_plan = $_GET["id_plan"];
            $plan = ControladorPlanes::ctrMostrarPlanes("id_plan", $id_plan);

            if (!$plan) {
                echo '<div class="alert alert-danger">El plan no existe.</div>';
                exit;
            }
        } else {
            echo '<div class="alert alert-danger">No se especificó un plan válido.</div>';
            exit;
        }
        ?>

        <!-- Formulario para modificar un plan existente -->
        <form method="POST" action="">
            <input type="hidden" name="id_plan" value="<?php echo $plan["id_plan"]; ?>">

            <div class="mb-3">
                <label for="nombre_plan" class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="nombre_plan" name="nombre_plan" value="<?php echo $plan["nombre_plan"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (Meses)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" value="<?php echo $plan["duracion"]; ?>" min="1" required>
            </div>

            <div class="mb-3">
                <label for="sesiones" class="form-label">Sesiones por Semana</label>
                <input type="number" class="form-control" id="sesiones" name="sesiones" value="<?php echo $plan["sesiones"]; ?>" min="1" max="7" required>
            </div>

            <div class="mb-3">
                <label for="id_entrenador" class="form-label">Entrenador</label>
                <select class="form-select" id="id_entrenador" name="id_entrenador" required>
                    <option value="" disabled>Seleccione un entrenador</option>
                    <?php
                    $entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);
                    foreach ($entrenadores as $entrenador) {
                        $selected = $entrenador["id_entrenador"] == $plan["id_entrenador"] ? "selected" : "";
                        echo '<option value="' . $entrenador["id_entrenador"] . '" ' . $selected . '>' . $entrenador["nombre_entrenador"] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio ($)</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $plan["precio"]; ?>" step="0.01" min="0" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $plan["descripcion"]; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Plan</button>
            <a href="<?php echo $url; ?>planes" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    // Llamar al método del controlador para modificar el plan
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        ControladorPlanes::mdlEditarPlan();
    }
    ?>
</body>
</html>
