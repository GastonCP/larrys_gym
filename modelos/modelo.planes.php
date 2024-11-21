<?php

require_once 'conexion.php';

class ModeloPlanes
{
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
    
    static public function mdlAgregarPlan($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (id_plan, nombre_plan, duracion, sesiones, precio) 
                 VALUES (:id_plan, :nombre_plan, :duracion, :sesiones, :precio)"
            );

            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_plan", $datos["nombre_plan"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
            $stmt->bindParam(":sesiones", $datos["sesiones"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    //agregue esta funcion
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
}

?>
