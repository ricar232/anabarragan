<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Enlace a archivo CSS principal -->
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message">Usuario o contraseña incorrectos. Inténtalo de nuevo.</p>
        <?php elseif (isset($_GET['error']) && $_GET['error'] == 2): ?>
            <p class="error-message">Hubo un problema con la base de datos. Inténtalo más tarde.</p>
        <?php endif; ?>

        <!-- Formulario de inicio de sesión -->
        <form action="validar_login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" required autofocus>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>

        <!-- Botón para invitados -->
        <div class="guest-login">
            <p>¿Eres un invitado?</p>
            <a href="pagina_invitado.php" class="guest-button">Entrar como Invitado</a>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #4a90e2, #357abd);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background: linear-gradient(135deg, #357abd, #4a90e2);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .guest-login {
            margin-top: 20px;
        }

        .guest-button {
            display: inline-block;
            padding: 12px 20px;
            background: linear-gradient(135deg, #50c878, #3da85b);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .guest-button:hover {
            background: linear-gradient(135deg, #3da85b, #50c878);
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</body>
</html>
