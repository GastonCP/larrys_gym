<?php

class ControladorPlanes
{
    ////////////////////////////////////////////////////////////////////////////////

    // Mostrar planes de entrenamiento
    static public function ctrMostrarPlanes($item, $valor)
    {
        $respuesta = ModeloPlanes::mdlMostrarPlanes($item, $valor);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Controlador Mostrar un plan de entrenamiento
    static public function ctrMostrarPlan($item, $valor)
    {
        $respuesta = ModeloPlanes::mdlMostrarPlan($item, $valor);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un plan de entrenamiento
    public function ctrAgregarPlan()
    {
        if (isset($_POST["nombre_plan"])) {
            $tabla = "planes_entrenamiento";

            $datos = array(
                "nombre_plan" => $_POST["nombre_plan"], 
                "duracion" => $_POST["duracion"],
                "sesiones" => $_POST["sesiones"],
                "precio" => $_POST["precio"],
                "descripcion" => $_POST["descripcion"]
            );
            
            $respuesta = ModeloPlanes::mdlAgregarPlan($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "planes";
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
                "nombre_plan" => $_POST["nombre_plan"],
                "duracion" => $_POST["duracion"],
                "sesiones" => $_POST["sesiones"],
                "precio" => $_POST["precio"],
                "descripcion" => $_POST["descripcion"]
            );

            $respuesta = ModeloPlanes::mdlEditarPlan($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "planes";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El plan de entrenamiento se edito correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Eliminar un plan de entrenamiento
    static public function ctrEliminarPlanes()
    {
        if (isset($_GET["id_plan_eliminar"])) {

            $url = ControladorPlantilla::url() . "planes";
            $tabla = "planes_entrenamiento";
            $dato = $_GET["id_plan_eliminar"];

            $respuesta = ModeloPlanes::mdlEliminarPlan($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El plan se eliminó correctamente", "' . $url . '");
                </script>';
                        }
                    }
    }

    ////////////////////////////////////////////////////////////////////////////////

} // Fin de la Clase