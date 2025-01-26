<?php
session_start();

// Validar que la sesión sea de invitado
if (!isset($_SESSION['invitado'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Invitado</title>
    <link rel="stylesheet" href="css/guest_page.css"> <!-- Estilos para invitados -->
</head>
<body>
    <div class="guest-container">
        <h1>Bienvenido, Invitado</h1>
        <p>Acceso exclusivo para invitados.</p>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
