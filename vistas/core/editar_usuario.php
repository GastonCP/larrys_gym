<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;// Redirige a la página de inicio de sesión si no es admin
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $rol = trim($_POST['rol']);

    if (!empty($nombre) && !empty($usuario) && !empty($email) && !empty($rol)) {
        $sql = "UPDATE usuarios SET nombre = ?, usuario = ?, email = ?, rol = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $usuario, $email, $rol, $id);

        if ($stmt->execute()) {
            header("Location: usuarios.php");
            exit;
        } else {
            $error = "Error: " . $stmt->error;
        }
    } else {
        $error = "Por favor, complete todos los campos.";
    }
} else {
    $sql = "SELECT nombre, usuario, email, rol FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="editar_usuario.php?id=<?php echo $id; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $user['nombre']; ?>" required>
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo $user['usuario']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="admin" <?php echo $user['rol'] == 'admin' ? 'selected' : ''; ?>>Administrador</option>
            <option value="usuario" <?php echo $user['rol'] == 'usuario' ? 'selected' : ''; ?>>Usuario</option>
        </select>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
