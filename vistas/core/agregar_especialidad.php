<div class="row">
    <div class="col-12">
        <h1>Agregar Especialidad</h1>
        <div class="card">
            <form method="POST">
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nombre de la Especialidad</label>
                        <input type="text" name="nombre_especialidad" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar Especialidad</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$agregar = new ControladorEspecialidades();
$agregar->ctrAgregarEspecialidad();
?>