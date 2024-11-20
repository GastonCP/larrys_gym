<?php

class ControladorPlanes
{
    // Mostrar planes de entrenamiento
    static public function ctrMostrarPlanes($item, $valor)
    {
        $respuesta = ModeloPlanes::mdlMostrarPlanes($item, $valor);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un plan de entrenamiento
    public function ctrAgregarPlan()
    {
        if (isset($_POST["nombre_plan"])) {
            $tabla = "planes_entrenamiento";

            $datos = array(
                "nombre" => $_POST["nombre_plan"],
                "duracion" => $_POST["duracion"],
                "descripcion" => $_POST["descripcion"],
                "precio" => $_POST["precio"]
            );

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlAgregarPlan($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El plan de entrenamiento se agregó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Editar un plan de entrenamiento
    public function ctrEditarPlan()
    {
        if (isset($_POST["id_plan"])) {
            $tabla = "planes_entrenamiento";

            $datos = array(
                "id_plan" => $_POST["id_plan"],
                "nombre" => $_POST["nombre_plan"],
                "duracion" => $_POST["duracion"],
                "descripcion" => $_POST["descripcion"],
                "precio" => $_POST["precio"]
            );

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlEditarPlan($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El plan de entrenamiento se actualizó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }


    ////////////////////////////////////////////////////////////////////////////////

    // Eliminar un plan de entrenamiento
    static public function ctrEliminarPlan()
    {
        if (isset($_GET["id_plan_eliminar"])) {
            $tabla = "planes_entrenamiento";
            $dato = $_GET["id_plan_eliminar"];

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlEliminarPlan($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El plan de entrenamiento se eliminó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

} // Fin de la Clase