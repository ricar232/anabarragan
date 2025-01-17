<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css"> <!-- Estilos generales del dashboard -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Iconos modernos -->
</head>
<body>
    <div class="dashboard-container">
        <!-- Menú lateral -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-user-circle"></i> Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="agregar_usuario.php"><i class="fas fa-user-plus"></i> Agregar Usuarios</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Listar Usuarios</a></li>
                <li><a href="lista_usuarios.php">Listar Usuarios</a></li>
                <li><a href="#"><i class="fas fa-cogs"></i> Configuración</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <main class="main-content">
            <header class="main-header">
                <h1>Panel de Control</h1>
                <p>Selecciona una opción del menú para continuar.</p>
            </header>
        </main>
    </div>
</body>
</html>
