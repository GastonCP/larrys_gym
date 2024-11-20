<?php
session_start();// Inicia o reanuda la sesión del usuario actual
require 'db_connection.php';

// Verificar si el usuario tiene rol de administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Obtener la lista de usuarios
$sql = "SELECT id, nombre, usuario, email, rol FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <a href="crear_usuario.php">Crear Nuevo Usuario</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['usuario']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['rol']; ?></td>
            <td>
                <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a> |
                <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
