<?php
session_start();
// Crear una sesión para invitados
$_SESSION['invitado'] = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Invitado</title>
    <link rel="stylesheet" href="css/guest.css"> <!-- Estilos específicos para invitados -->
</head>
<body>
    <div class="guest-container">
        <h1>Bienvenido, Invitado</h1>
        <p>Esta es una página exclusiva para invitados. Aquí puedes explorar contenido limitado.</p>
        <a href="logout.php">Salir</a>
    </div>
</body>
</html>
