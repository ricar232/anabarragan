<?php
session_start();

// Verifica si la sesión está activa
if (session_status() === PHP_SESSION_ACTIVE) {
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrando Sesión</title>
    <link rel="stylesheet" href="css/logout.css"> <!-- Puedes crear estilos personalizados -->
    <script>
        // Redirige automáticamente después de 2 segundos
        setTimeout(() => {
            window.location.href = "index.php";
        }, 2000);
    </script>
</head>
<body>
    <div class="logout-container">
        <h1>Sesión cerrada correctamente</h1>
        <p>Serás redirigido al inicio de sesión en unos momentos...</p>
    </div>
</body>
</html>
