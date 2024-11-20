<?php
session_start();
session_unset(); // Destruir la sesión y redirigir al login
session_destroy();
header("Location: login.php");
exit;
?>

