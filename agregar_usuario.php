<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="css/agregar_usuario.css"> <!-- Estilos personalizados -->
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
                <h1>Registrar Usuario</h1>
            </header>
            <section class="register-form">
                <form action="registrar_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre y Apellidos</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre y apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion"><i class="fas fa-map-marker-alt"></i> Dirección</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Número de Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="correo"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="seguro_social"><i class="fas fa-id-card"></i> Seguro Social</label>
                        <input type="text" id="seguro_social" name="seguro_social" placeholder="Seguro Social" required>
                    </div>
                    <div class="form-group">
                        <label for="medicare"><i class="fas fa-notes-medical"></i> Medicare</label>
                        <input type="text" id="medicare" name="medicare" placeholder="Medicare">
                    </div>
                    <div class="form-group">
                        <label for="medicaid"><i class="fas fa-file-medical"></i> Medicaid</label>
                        <input type="text" id="medicaid" name="medicaid" placeholder="Medicaid">
                    </div>
                    <div class="form-group">
                        <label for="dr_primario"><i class="fas fa-user-md"></i> Nombre del Dr. Primario</label>
                        <input type="text" id="dr_primario" name="dr_primario" placeholder="Dr. Primario">
                    </div>
                    <div class="form-group">
                        <label for="id_pcp"><i class="fas fa-id-badge"></i> ID PCP</label>
                        <input type="text" id="id_pcp" name="id_pcp" placeholder="ID PCP">
                    </div>
                    <div class="form-group">
                        <label for="npi"><i class="fas fa-user-tag"></i> NPI</label>
                        <input type="text" id="npi" name="npi" placeholder="NPI">
                    </div>
                    <div class="form-group">
                        <label for="plan_medico"><i class="fas fa-briefcase-medical"></i> Plan Médico</label>
                        <input type="text" id="plan_medico" name="plan_medico" placeholder="Plan Médico">
                    </div>
                    <button type="submit" class="btn-submit"><i class="fas fa-user-plus"></i> Registrar Usuario</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
