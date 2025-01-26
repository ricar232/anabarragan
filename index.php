<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css"> <!-- Ruta a tus estilos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="background"></div>
    <div class="login-container">
        <h1><i class="fas fa-user-circle"></i> Iniciar Sesión</h1>

        <!-- Mensajes de error -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message"><i class="fas fa-exclamation-triangle"></i> Usuario o contraseña incorrectos.</p>
        <?php endif; ?>

        <!-- Formulario de inicio de sesión para usuarios registrados -->
        <form action="validar_login.php" method="POST">
            <div class="input-container">
                <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="input-container">
                <label for="password"><i class="fas fa-lock"></i> Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
        </form>

        <!-- Botón para invitados -->
        <div class="guest-container">
            <p>¿Eres un invitado?</p>
            <form action="pagina_invitado.php" method="POST">
                <button type="submit" class="btn-guest"><i class="fas fa-user"></i> Entrar como Invitado</button>
            </form>
        </div>
    </div>

    <!-- Estilos -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/background.jpg') no-repeat center center/cover; /* Ruta a tu imagen */
            z-index: -1;
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .input-container {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-container label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .input-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .guest-container {
            margin-top: 20px;
            text-align: center;
        }

        .btn-guest {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-guest:hover {
            background-color: #218838;
        }
    </style>
</body>
</html>
