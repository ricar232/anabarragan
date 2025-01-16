<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header('Location: php/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .welcome {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .logout {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s;
        }
        .logout:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong>!
        </div>
        <a href="php/logout.php" class="logout">Cerrar Sesión</a>
    </div>
</body>
</html>
