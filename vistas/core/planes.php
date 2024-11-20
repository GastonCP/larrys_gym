<!-- FALTANTES -->
<!-- → que pueda eliminar correctamente // btnEliminarPlan -->

<?php
// Llamar al controlador para obtener todos los planes
$planes = ControladorPlanes::ctrMostrarPlanes(null, null); 
$cantidad = count($planes);
?>

<div class="row">
    <div class="col-12">
        <h1>Planes</h1>
        <Planes(s="card">
            <div class="card-header">
                <a href="planes_agregar" class="btn btn-info">Agregar Nuevo Plan</a>
            </div>

            <?php if ($cantidad > 0) { ?>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Duración (Mes)</th>
                            <th>Sesiones (Sem)</th>
                            <th>Entrenador</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($planes as $plan) { ?>
                            <tr>
                                <td><?php echo $plan["id_plan"]; ?></td>
                                <td><?php echo $plan["nombre_plan"]; ?></td>
                                <td><?php echo $plan["duracion"]; ?></td>
                                <td><?php echo $plan["sesiones"]; ?></td>
                                <td><?php echo $plan["id_entrenador"]; ?></td>
                                <td><?php echo $plan["precio"]; ?></td>
                                <td>

                                    <!-- Boton Ediar Plan -->
                                    <a href="planes_editar/<?php echo $plan["id_plan"]; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                     <!-- Boton Eliminar Plan -->
                                    <button
                                    class="btn btn-danger btnEliminarPlan"
                                    id_plan=<?php echo $plan["id_plan"]; ?>
                                    ><i class="fas fa-trash"></i></button></td>

                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <h3>No hay Planes de Entrenamiento registrados</h3>
            <?php } ?>
        </div>
    </div>
</div>

<?php 

$eliminar = new ControladorPlanes();
$eliminar -> ctrEliminarPlanes();
?>