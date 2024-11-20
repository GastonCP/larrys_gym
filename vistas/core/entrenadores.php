<?php
$entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores(null, null);

// $cantidad = count($entrenadores);
$cantidad = is_array($entrenadores) ? count($entrenadores) : 0;

?>

<div class="row">
    <div class="col-12">
        <h1>Entrenadores</h1>
        <div class="card">
            <div class="card-header">
                <a href="agregar_entrenador" class="btn btn-info">Agregar Entrenador</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Fecha de Contratación</th>
                                <th>Estado</th>
                                <th>Especialidades</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($entrenadores as $entrenador) { ?>
                            <tr>
                                <td><?php echo $entrenador["dni"]; ?></td>
                                <td><?php echo $entrenador["nombre"]; ?></td>
                                <td><?php echo $entrenador["apellido"]; ?></td>
                                <td><?php echo $entrenador["telefono"]; ?></td>
                                <td><?php echo $entrenador["email"]; ?></td>
                                <td><?php echo $entrenador["fecha_contratacion"]; ?></td>
                                <td><?php echo $entrenador["estado"] == 1 ? "Activo" : "Inactivo"; ?></td>
                                <td>
                                    <?php
                                    $especialidades = ControladorEntrenadores::ctrMostrarEspecialidadesEntrenador($entrenador["id_entrenador"]);
                                    if (!empty($especialidades)) {
                                        foreach ($especialidades as $especialidad) {
                                            echo "<span class='badge bg-primary'>" . $especialidad["nombre_especialidad"] . "</span> ";
                                        }
                                    } else {
                                        echo "Sin especialidades";
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="editar_entrenador/<?php echo $entrenador["id_entrenador"]; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button
                                    class="btn btn-danger btnEliminarEntrenador"
                                    id_entrenador="<?php echo $entrenador["id_entrenador"]; ?>"
                                    ><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>

                            <input type="hidden" id="url" value="<?php echo $url; ?>">

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <h3>No hay entrenadores registrados</h3>
            <?php } ?>
        </div>
    </div>
</div>

<?php 

$eliminar = new ControladorEntrenadores();
$eliminar -> ctrEliminarEntrenador();

?>
