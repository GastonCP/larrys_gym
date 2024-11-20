<?php

class ControladorEntrenadores
{
    // Mostrar entrenadores
    static public function ctrMostrarEntrenadores($item, $valor)
    {
        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    }

    // Método para agregar entrenadores
    static public function ctrAgregarEntrenador()
    {
        if (isset($_POST["dni"])) {
            $tabla = "entrenadores";

            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_contratacion" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"]
            );

            $respuesta = ModeloEntrenadores::mdlAgregarEntrenador($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "entrenadores";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El entrenador se agregó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    // Método para editar entrenadores
    public function ctrEditarEntrenador()
    {
        if (isset($_POST["id_entrenador"])) {
            $tabla = "entrenadores";
    
            $id_entrenador = $_POST["id_entrenador"]; // Definir $id_entrenador desde POST
    
            $datos = array(
                "id_entrenador" => $id_entrenador,
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_contratacion" => $_POST["fecha_contratacion"],
                "estado" => $_POST["estado"]
            );
    
            // Actualizar especialidades si existen
            if (!empty($_POST["especialidades"])) {
                ModeloEntrenadores::mdlActualizarEspecialidades($id_entrenador, $_POST["especialidades"]);
            } else {
                // Si no hay especialidades seleccionadas, eliminar todas las actuales
                ModeloEntrenadores::mdlActualizarEspecialidades($id_entrenador, []);
            }
    
            $respuesta = ModeloEntrenadores::mdlEditarEntrenador($tabla, $datos);
    
            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "entrenadores";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El entrenador se actualizó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }
    

    // Método para eliminar entrenadores
    static public function ctrEliminarEntrenador()
    {
        if (isset($_GET["id_entrenador_eliminar"])) {
            $url = ControladorPlantilla::url() . "entrenadores";
            $tabla = "entrenadores";
            $dato = $_GET["id_entrenador_eliminar"];

            $respuesta = ModeloEntrenadores::mdlEliminarEntrenador($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El entrenador se eliminó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    public static function ctrMostrarEspecialidadesEntrenador($id_entrenador) {
        return ModeloEntrenadores::mdlMostrarEspecialidadesEntrenador($id_entrenador);
    }
    
}

?>
