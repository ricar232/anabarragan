<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="css/agregar_usuario.css"> <!-- Estilos específicos para agregar usuarios -->
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
                <li><a href="agregar_usuario.php" class="active"><i class="fas fa-user-plus"></i> Agregar Usuarios</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Listar Usuarios</a></li>
                <li><a href="#"><i class="fas fa-cogs"></i> Configuración</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <main class="main-content">
            <header class="main-header">
                <h1>Agregar Usuario</h1>
            </header>
            <section class="register-form">
                <form action="registrar_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre y Apellidos</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre y apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required>
                    </div>
                    <!-- Resto de los campos -->
                    <button type="submit" class="btn-submit">Registrar Usuario</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
