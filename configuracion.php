<?php
require 'conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Obtener todos los usuarios que tienen acceso al sistema
$sql = "SELECT id, usuario FROM usuarios";
$stmt = $conn->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Manejo de solicitudes POST para cambiar contraseña o agregar/eliminar usuarios
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cambiar_password'])) {
        $user_id = $_POST['user_id'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

        $sql_update = "UPDATE usuarios SET password = :password WHERE id = :id";
        $stmt = $conn->prepare($sql_update);
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $mensaje = "Contraseña actualizada correctamente.";
    }

    if (isset($_POST['agregar_usuario'])) {
        $nuevo_usuario = $_POST['nuevo_usuario'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql_insert = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':usuario', $nuevo_usuario);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $mensaje = "Usuario agregado correctamente.";
    }

    if (isset($_POST['eliminar_usuario'])) {
        $user_id = $_POST['user_id'];

        $sql_delete = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $mensaje = "Usuario eliminado correctamente.";
    }

    // Recargar la lista de usuarios después de cualquier cambio ok
    $stmt = $conn->query($sql);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="css/configuracion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="config-container">
        <h2><i class="fas fa-users-cog"></i> Gestión de Usuarios</h2>
        
        <?php if (!empty($mensaje)): ?>
            <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <!-- Usuarios Actuales -->
        <div class="usuarios-list">
            <h3><i class="fas fa-user"></i> Usuarios Actuales</h3>
            <ul>
                <?php foreach ($usuarios as $usuario): ?>
                    <li>
                        <i class="fas fa-user-circle"></i> 
                        <strong>Usuario:</strong> <?php echo htmlspecialchars($usuario['usuario']); ?>
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $usuario['id']; ?>">
                            <button type="submit" name="eliminar_usuario" class="btn-delete">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Cambiar Contraseña -->
        <div class="form-container">
            <h3><i class="fas fa-key"></i> Cambiar Contraseña</h3>
            <form action="" method="POST" class="form-style">
                <label for="user_id">Usuario:</label>
                <select name="user_id" required>
                    <option value="" disabled selected>Seleccionar usuario</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?php echo $usuario['id']; ?>"><?php echo htmlspecialchars($usuario['usuario']); ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="new_password">Nueva Contraseña:</label>
                <input type="password" name="new_password" placeholder="Ingrese nueva contraseña" required>
                <button type="submit" name="cambiar_password" class="btn-update">
                    <i class="fas fa-save"></i> Actualizar
                </button>
            </form>
        </div>

        <!-- Agregar Usuario -->
        <div class="form-container">
            <h3><i class="fas fa-user-plus"></i> Agregar Usuario</h3>
            <form action="" method="POST" class="form-style">
                <label for="nuevo_usuario">Nuevo Usuario:</label>
                <input type="text" name="nuevo_usuario" placeholder="Ingrese nuevo usuario" required>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" placeholder="Ingrese contraseña" required>
                <button type="submit" name="agregar_usuario" class="btn-add">
                    <i class="fas fa-user-plus"></i> Agregar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
