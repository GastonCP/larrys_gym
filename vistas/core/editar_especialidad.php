<?php
$especialidad = null;


if (isset($_GET["pagina"])) {
    
    $pagina = explode("/", $_GET["pagina"]);
    $id_especialidad = $pagina[1];  

    $item = "id_especialidad";
    $valor = $id_especialidad;

    $especialidad = ControladorEspecialidades::ctrMostrarEspecialidades($item, $valor);
}

if (!$especialidad) {
    echo '<div class="alert alert-danger">No se encontró el especialidad.</div>';
    return;
}

?>



<div class="row">
    <div class="col-12">
        <h1>Editar Especialidad</h1>
        <form method="POST">
            <input type="hidden" name="id_especialidad" value="<?php echo $especialidad["id_especialidad"]; ?>">

            <div class="mb-3">
                <label>Nombre de la Especialidad</label>
                <input type="text" name="nombre_especialidad" class="form-control" value="<?php echo $especialidad["nombre_especialidad"]; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>

<?php
$editar = new ControladorEspecialidades();
$editar->ctrEditarEspecialidad();
?>