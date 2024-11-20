<?php
$planes = ControladorPlanes::ctrMostrarPlanes(null, null); // Llamar al controlador para obtener todos los planes
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Planes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Planes de Entrenamiento</h1>

        <!-- Tabla de Planes -->
        <table class="table table-bordered table-striped">
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
                <?php
                foreach ($planes as $plan) {
                    echo '<tr>
                            <td>' . $plan["id_plan"] . '</td>
                            <td>' . $plan["nombre_plan"] . '</td>
                            <td>' . $plan["duracion"] . '</td>
                            <td>' . $plan["sesiones"] . '</td>
                            <td>' . $plan["id_entrenador"] . '</td>
                            <td>$' . $plan["precio"] . '</td>
                            <td>';?>
                            <td>
                            <a href="planes_editar/<?php echo $plan["id_plan"]; ?>" class="btn btn-warning"> 
                            <i class="fas fa-edit"></i> Editar</a>

                            <!-- <a href="planes_eliminar/<?php# echo $plan["id_plan"]; ?>" class="btn btn-danger">  -->
                            <!-- <i class="fas fa-trash"></i> Eliminar</button> -->
                            </td>
                    <?php echo '</td></tr>';
                }
                ?>
            </tbody>
        </table>
        
        <!-- Se llama de esta forma para que se guie implementando el url -->
        <a href="<?php echo $url; ?>core/planes_agregar" 
        class="btn btn-primary">Agregar Nuevo Plan</a>
        
    </div>
</body>
</html>

<?php
# Se podria acomodar para que por diga mes/meses y semana / semanas 