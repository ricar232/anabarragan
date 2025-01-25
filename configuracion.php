<?php
require 'conexion.php';

// Consulta para obtener todos los usuarios que tienen acceso al sistema
$sql = "SELECT id, usuario FROM usuarios";
$result = $conn->query($sql);

// Manejo de solicitudes POST para cambiar contraseña o agregar/eliminar usuarios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cambiar contraseña
    if (isset($_POST['cambiar_password'])) {
        $user_id = $_POST['user_id'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

        $sql_update = "UPDATE usuarios SET password = :password WHERE id = :id";
        $stmt = $conn->prepare($sql_update);
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        echo "<p class='success'>Contraseña actualizada correctamente.</p>";
    }

    // Agregar usuario
    if (isset($_POST['agregar_usuario'])) {
        $nuevo_usuario = $_POST['nuevo_usuario'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql_insert = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':usuario', $nuevo_usuario);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo "<p class='success'>Usuario agregado correctamente.</p>";
    }

    // Eliminar usuario
    if (isset($_POST['eliminar_usuario'])) {
        $user_id = $_POST['user_id'];

        $sql_delete = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        echo "<p class='success'>Usuario eliminado correctamente.</p>";
    }
}
?>

<div class="config-container">
    <h2>Gestión de Usuarios</h2>
    <div class="usuarios-list">
        <h3>Usuarios Actuales</h3>
        <ul>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <li>
                    <strong>Usuario:</strong> <?php echo htmlspecialchars($row['usuario']); ?>
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="eliminar_usuario" class="btn-delete">Eliminar</button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div class="form-container">
        <h3>Cambiar Contraseña</h3>
        <form action="" method="POST">
            <label for="user_id">Usuario:</label>
            <select name="user_id" required>
                <option value="" disabled selected>Seleccionar usuario</option>
                <?php
                $result->execute(); // Reejecutar la consulta para repoblar el dropdown
                while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['usuario']); ?></option>
                <?php endwhile; ?>
            </select>
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" name="new_password" required>
            <button type="submit" name="cambiar_password">Actualizar</button>
        </form>
    </div>

    <div class="form-container">
        <h3>Agregar Usuario</h3>
        <form action="" method="POST">
            <label for="nuevo_usuario">Nuevo Usuario:</label>
            <input type="text" name="nuevo_usuario" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit" name="agregar_usuario">Agregar</button>
        </form>
    </div>
</div>
