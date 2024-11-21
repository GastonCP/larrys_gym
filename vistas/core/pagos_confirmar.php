<?php
require_once "config/db.php";

$data = json_decode(file_get_contents("php://input"), true);
$id_pago = $data['id_pago'];

$sql = "UPDATE pagos SET estado = 'COMPLETADO' WHERE id_pago = :id_pago AND estado = 'PENDIENTE'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id_pago', $id_pago, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
