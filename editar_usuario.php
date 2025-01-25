<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/editar_usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <h1 class="title"><i class="fas fa-user-edit"></i> Editar Usuario</h1>
            <?php if ($usuario): ?>
                <form action="" method="POST" class="form">
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre y Apellidos:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion"><i class="fas fa-map-marker-alt"></i> Dirección:</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo"><i class="fas fa-envelope"></i> Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="seguro_social"><i class="fas fa-id-card"></i> Seguro Social:</label>
                        <input type="text" id="seguro_social" name="seguro_social" value="<?php echo htmlspecialchars($usuario['seguro_social']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="medicare"><i class="fas fa-hospital"></i> Medicare:</label>
                        <input type="text" id="medicare" name="medicare" value="<?php echo htmlspecialchars($usuario['medicare']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="medicaid"><i class="fas fa-clinic-medical"></i> Medicaid:</label>
                        <input type="text" id="medicaid" name="medicaid" value="<?php echo htmlspecialchars($usuario['medicaid']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="dr_primario"><i class="fas fa-user-md"></i> Nombre del Dr. Primario:</label>
                        <input type="text" id="dr_primario" name="dr_primario" value="<?php echo htmlspecialchars($usuario['dr_primario']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_pcp"><i class="fas fa-id-badge"></i> ID PCP:</label>
                        <input type="text" id="id_pcp" name="id_pcp" value="<?php echo htmlspecialchars($usuario['id_pcp']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="npi"><i class="fas fa-fingerprint"></i> NPI:</label>
                        <input type="text" id="npi" name="npi" value="<?php echo htmlspecialchars($usuario['npi']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="plan_medico"><i class="fas fa-file-medical-alt"></i> Plan Médico:</label>
                        <input type="text" id="plan_medico" name="plan_medico" value="<?php echo htmlspecialchars($usuario['plan_medico']); ?>">
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Guardar Cambios</button>
                        <a href="lista_usuarios.php" class="btn-cancel"><i class="fas fa-times"></i> Cancelar</a>
                    </div>
                </form>
            <?php else: ?>
                <p class="error-message">Usuario no encontrado.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
