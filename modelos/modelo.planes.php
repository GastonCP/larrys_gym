<?php

require_once 'conexion.php';

class ModeloPlanes
{
    ////////////////////////////////////////////////////////////////////////////////
    
    // Mostrar todos plan de entrenamiento
    static public function mdlMostrarPlanes()
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM planes_entrenamiento");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Modelo Mostrar un plan de entrenamiento por ID
    static public function mdlMostrarPlan($item, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM planes_entrenamiento WHERE $item = :$item");
            $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna el plan encontrado
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un plan de entrenamiento
    static public function mdlAgregarPlan($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_plan, duracion, sesiones, precio, descripcion) VALUES (:nombre_plan, :duracion, :sesiones, :precio, :descripcion)");
    
        $stmt->bindParam(":nombre_plan", $datos["nombre_plan"], PDO::PARAM_STR);
        $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
        $stmt->bindParam(":sesiones", $datos["sesiones"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    
        $stmt = null; // Cerrar conexión
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Editar un plan de entrenamiento
    static public function mdlEditarPlan($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_plan = :nombre_plan, duracion = :duracion, sesiones = :sesiones, precio = :precio, descripcion = :descripcion WHERE id_plan = :id_plan");

        $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_plan", $datos["nombre_plan"], PDO::PARAM_STR);
        $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
        $stmt->bindParam(":sesiones", $datos["sesiones"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null; // Cerrar conexión
    }

    ////////////////////////////////////////////////////////////////////////////////
    
    // Eliminar un plan de entrenamiento
    static public function mdlEliminarPlan($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_plan = :id_plan");
            
            $stmt->bindParam(":id_plan", $dato, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

}?>
