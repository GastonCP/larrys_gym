<?php

require_once 'conexion.php';

class ModeloEntrenadores
{
    static public function mdlMostrarEntrenadores($item, $valor)
    {
        try {
            $db = Conexion::conectar();

            if ($item != null) {
                $stmt = $db->prepare(
                    "SELECT e.id_entrenador, e.dni, e.nombre, e.apellido, e.telefono, 
                            e.email, e.fecha_contratacion, e.estado
                     FROM entrenadores AS e
                     WHERE $item = :$item"
                );
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = $db->prepare(
                    "SELECT e.id_entrenador, e.dni, e.nombre, e.apellido, e.telefono, 
                            e.email, e.fecha_contratacion, e.estado
                     FROM entrenadores AS e"
                );
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            // return "Error: " . $e->getMessage();
            return [];
        }
    }

    static public function mdlAgregarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (dni, nombre, apellido, telefono, email, fecha_contratacion, estado) 
                 VALUES (:dni, :nombre, :apellido, :telefono, :email, :fecha_contratacion, :estado)"
            );

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_contratacion", $datos["fecha_contratacion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEntrenador($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE $tabla 
                 SET dni = :dni, nombre = :nombre, apellido = :apellido,  telefono = :telefono, email = :email, 
                     fecha_contratacion = :fecha_contratacion, estado = :estado 
                 WHERE id_entrenador = :id_entrenador"
            );

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_contratacion", $datos["fecha_contratacion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->bindParam(":id_entrenador", $datos["id_entrenador"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarEntrenador($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");

            $stmt->bindParam(":id_entrenador", $dato, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public static function mdlMostrarEspecialidadesEntrenador($id_entrenador) {
        try {
            $stmt = Conexion::conectar()->prepare(
                "SELECT es.id_especialidad, es.nombre_especialidad 
                 FROM entrenador_especialidades ee
                 INNER JOIN especialidades es ON ee.id_especialidad = es.id_especialidad
                 WHERE ee.id_entrenador = :id_entrenador"
            );
            $stmt->bindParam(":id_entrenador", $id_entrenador, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "error: " . $e->getMessage();
        }
    }

    public static function mdlMostrarTodasEspecialidades() {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM especialidades");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "error: " . $e->getMessage();
        }
    }
    
    public static function mdlActualizarEspecialidades($id_entrenador, $especialidades) {
        try {
            $db = Conexion::conectar();
            $db->beginTransaction();
    
            // Eliminar especialidades actuales
            $stmt = $db->prepare("DELETE FROM entrenador_especialidades WHERE id_entrenador = :id_entrenador");
            $stmt->bindParam(":id_entrenador", $id_entrenador, PDO::PARAM_INT);
            $stmt->execute();
    
            // Insertar las nuevas especialidades
            $stmt = $db->prepare("INSERT INTO entrenador_especialidades (id_entrenador, id_especialidad) VALUES (:id_entrenador, :id_especialidad)");
            foreach ($especialidades as $id_especialidad) {
                $stmt->bindParam(":id_entrenador", $id_entrenador, PDO::PARAM_INT);
                $stmt->bindParam(":id_especialidad", $id_especialidad, PDO::PARAM_INT);
                $stmt->execute();
            }
    
            $db->commit();
            return "ok";
        } catch (PDOException $e) {
            $db->rollBack();
            return "error: " . $e->getMessage();
        }
    }
    
}
?>
