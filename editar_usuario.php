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
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre y Apellidos:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="seguro_social">Seguro Social:</label>
                        <input type="text" id="seguro_social" name="seguro_social" value="<?php echo htmlspecialchars($usuario['seguro_social']); ?>">
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar Cambios</button>
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
