<?php
$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades();


$cantidad = count($especialidades);
?>

<div class="row">
    <div class="col-12">
        <h1>Especialidades</h1>
        <div class="card">
            <div class="card-header">
                <a href="agregar_especialidad" class="btn btn-info">Agregar Especialidad</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($especialidades as $especialidad) { ?>
                            <tr>
                                <td><?php echo $especialidad["id_especialidad"]; ?></td>
                                <td><?php echo $especialidad["nombre_especialidad"]; ?></td>
                                <td>
                                    <a href="editar_especialidad/<?php echo $especialidad["id_especialidad"]; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button
                                    class="btn btn-danger btnEliminarEspecialidad"
                                    id_especialidad=<?php echo $especialidad["id_especialidad"]; ?>
                                    ><i class="fas fa-trash"></i></button></td>

                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <h3>No hay especialidades registrados</h3>
            <?php } ?>
        </div>
    </div>
</div>

<?php
$eliminar = new ControladorEspecialidades();
$eliminar->ctrEliminarEspecialidad();
?>