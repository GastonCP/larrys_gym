<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];// Obtiene el ID del usuario a eliminar desde la URL
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: usuarios.php");// Redirige a la lista de usuarios si se eliminó con éxito
} else {
    echo "Error: " . $stmt->error;
}
?>
