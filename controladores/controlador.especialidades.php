<?php

class ControladorEspecialidades
{
    // Mostrar Especialidades
    static public function ctrMostrarEspecialidades($item = null, $valor = null)
{
    $respuesta = ModeloEspecialidad::mdlMostrarEspecialidad($item, $valor);
    return $respuesta;
}

    // Método para agregar Especialidades
    static public function ctrAgregarEspecialidad()
    {
        if (isset($_POST["nombre_especialidad"])) {
            $tabla = "especialidades";

            $datos = ["nombre_especialidad" => $_POST["nombre_especialidad"]];

            $respuesta = ModeloEspecialidad::mdlAgregarEspecialidad($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "especialidades";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "La especialidad se agregó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    static public function ctrEditarEspecialidad()
    {
        if (isset($_POST["id_especialidad"])) {
            $tabla = "especialidades";
    
            $datos = [
                "id_especialidad" => $_POST["id_especialidad"],
                "nombre_especialidad" => $_POST["nombre_especialidad"]
            ];
    
            $respuesta = ModeloEspecialidad::mdlEditarEspecialidad($tabla, $datos);
    
            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "especialidades";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "La especialidad se actualizó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    static public function ctrEliminarEspecialidad()
    {
        if (isset($_GET["id_especialidad_eliminar"])) {

            $url = ControladorPlantilla::url() . "especialidades";
            $tabla = "especialidades";
            $dato = $_GET["id_especialidad_eliminar"];

            $respuesta = ModeloEspecialidad::mdlEliminarEspecialidad($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "La especialidad se eliminó correctamente", "' . $url . '");
                </script>';
                        }
                    }
    }

    
}

?>