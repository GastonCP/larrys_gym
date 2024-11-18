<!-- <h1>Agregar Plan</h1> -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Nuevo Plan de Entrenamiento</h1>
        
        <!-- Formulario para agregar un nuevo plan -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre_plan" class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="nombre_plan" name="nombre_plan" required>
            </div>

            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (Meses)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" min="1" required>
            </div>

            <div class="mb-3">
                <label for="sesiones" class="form-label">Sesiones por Semana</label>
                <input type="number" class="form-control" id="sesiones" name="sesiones" min="1" max="7" required>
            </div>

            <div class="mb-3">
                <label for="id_entrenador" class="form-label">Entrenador</label>
                <select class="form-select" id="id_entrenador" name="id_entrenador" required>
                    <option value="" selected disabled>Seleccione un entrenador</option>
                    
                    
                    <!-- Espacio para listar entrenadores mergeando -->   
                    <!-- Implementar cuando este asociado a entrenadores -->                  
                    <?php
                    // Obtener entrenadores desde el controlador
                    //$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);
                    //foreach ($entrenadores as $entrenador) {
                    //    echo '<option value="' . $entrenador["id_entrenador"] . '">' . $entrenador["nombre_entrenador"] . '</option>';
                    //}
                    ?>


                </select>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio ($)</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Plan</button>
            <a href="<?php echo $url; ?>planes" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    // Llamar al método del controlador para agregar el plan
    $agregarPlan = new ControladorPlanes();
    $agregarPlan->ctrAgregarPlan();
    ?>
</body>
</html>
