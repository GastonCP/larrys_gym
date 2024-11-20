<?php
$entrenador = null;
$especialidadesEntrenador = [];

// Verificar que se recibe el parámetro id_entrenador desde la URL
if (isset($_GET["pagina"])) {
    // Extraer el id_entrenador del segmento de la URL
    $pagina = explode("/", $_GET["pagina"]);
    $id_entrenador = $pagina[1]; // El id del entrenador es el segundo segmento

    $item = "id_entrenador";
    $valor = $id_entrenador;

    $entrenador = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

    // Obtener todas las especialidades
    $especialidades = ModeloEntrenadores::mdlMostrarTodasEspecialidades();

    // Obtener las especialidades del entrenador
    $especialidadesEntrenador = ControladorEntrenadores::ctrMostrarEspecialidadesEntrenador($id_entrenador);


}

// Si no se encuentra el entrenador, mostrar un mensaje de error
if (!$entrenador) {
    echo '<div class="alert alert-danger">No se encontró el entrenador.</div>';
    return;
}

?>

<div class="row">
    <div class="col-12">
        <h1>Editar Entrenador</h1>
        <form method="POST">
            <input type="hidden" name="id_entrenador" value="<?php echo $entrenador["id_entrenador"]; ?>">

            <div class="mb-3">
                <label>DNI</label>
                <input type="text" name="dni" class="form-control" value="<?php echo $entrenador["dni"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $entrenador["nombre"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $entrenador["apellido"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $entrenador["telefono"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $entrenador["email"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Fecha de Contratación</label>
                <input type="date" name="fecha_contratacion" class="form-control" value="<?php echo $entrenador["fecha_contratacion"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="1" <?php echo $entrenador["estado"] == 1 ? "selected" : ""; ?>>Activo</option>
                    <option value="0" <?php echo $entrenador["estado"] == 0 ? "selected" : ""; ?>>Inactivo</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Especialidades</label>
                <select name="especialidades[]" class="form-control select2" multiple>
                    <?php foreach ($especialidades as $especialidad) { ?>
                        <option value="<?php echo $especialidad["id_especialidad"]; ?>" 
                            <?php echo in_array($especialidad["id_especialidad"], array_column($especialidadesEntrenador, "id_especialidad")) ? "selected" : ""; ?>>
                            <?php echo $especialidad["nombre_especialidad"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>

<?php
$editar = new ControladorEntrenadores();
$editar->ctrEditarEntrenador();
?>
