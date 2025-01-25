<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Invitado</title>
    <link rel="stylesheet" href="css/guest_login.css"> <!-- Archivo CSS para invitados -->
</head>
<body>
    <div class="login-container">
        <h1>Acceso Invitado</h1>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message">Hubo un problema. Inténtalo de nuevo.</p>
        <?php endif; ?>

        <form action="validar_invitado.php" method="POST">
            <button type="submit" class="guest-button">Entrar como Invitado</button>
        </form>
    </div>
</body>
</html>
