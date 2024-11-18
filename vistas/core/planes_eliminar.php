<?php
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["confirmar"])) {
        $respuesta = ControladorPlanes::ctrEliminarPlan($id_plan);

        if ($respuesta == "ok") {
            echo '<script>
                fncSweetAlert(
                    "success",
                    "El plan ha sido eliminado correctamente.",
                    "' . $url . 'planes"
                );
            </script>';
        } else {
            echo '<div class="alert alert-danger">Hubo un error al intentar eliminar el plan.</div>';
        }
    } elseif (isset($_POST["cancelar"])) {
        echo '<script>window.location = "' . $url . 'planes";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Eliminar Plan</h1>
        <p>¿Estás seguro que deseas eliminar el plan: <strong><?php echo $plan["nombre_plan"]; ?></strong>?</p>

        <form method="POST" action="">
            <button type="submit" name="confirmar" class="btn btn-danger">Eliminar</button>
            <button type="submit" name="cancelar" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>
</body>
</html>
