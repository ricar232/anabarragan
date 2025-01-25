<div class="config-container">
    <h2><i class="fas fa-users-cog"></i> Gestión de Usuarios</h2>
    
    <!-- Usuarios Actuales -->
    <div class="usuarios-list">
        <h3><i class="fas fa-user"></i> Usuarios Actuales</h3>
        <ul>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <li>
                    <i class="fas fa-user-circle"></i> 
                    <strong>Usuario:</strong> <?php echo htmlspecialchars($row['usuario']); ?>
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="eliminar_usuario" class="btn-delete">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <!-- Cambiar Contraseña -->
    <div class="form-container">
        <h3><i class="fas fa-key"></i> Cambiar Contraseña</h3>
        <form action="" method="POST" class="form-style">
            <label for="user_id">Usuario:</label>
            <select name="user_id" required>
                <option value="" disabled selected>Seleccionar usuario</option>
                <?php
                $result->execute(); // Reejecutar la consulta
                while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['usuario']); ?></option>
                <?php endwhile; ?>
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
