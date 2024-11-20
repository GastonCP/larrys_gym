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
}

?>
