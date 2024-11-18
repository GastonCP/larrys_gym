<?php


$planes = ModeloPlanes::mdlMostrarPlanes();

?>


<div class="row">
    <div class="col-12">
        <h1>Agregar Cliente</h1>
        <div class="card">
            <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha de Inscripción</label>
                        <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="plan">Plan</label>
                        <select class="form-control" id="plan" name="plan" required>
                            <?php foreach ($planes as $plan) { ?>
                                <option value="<?php echo $plan["id_plan"]; ?>">
                                    <?php echo $plan["nombre_plan"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$agregarCliente = new ControladorClientes();
$agregarCliente->ctrAgregarCliente();
?>
