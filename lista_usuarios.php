<?php
require 'conexion.php';

// Consultar los usuarios registrados
try {
    $sql = "SELECT id, nombre, telefono, correo, seguro_social, plan_medico FROM usuarios_registrados";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al consultar usuarios: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="css/lista_usuarios.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios Registrados</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Seguro Social</th>
                        <th>Plan Médico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($usuarios) > 0): ?>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['seguro_social']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['plan_medico']); ?></td>
                                <td>
                                    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" class="action-button edit"><i class="fas fa-edit"></i></a>
                                    <a href="borrar_usuario.php?id=<?php echo $usuario['id']; ?>" class="action-button delete" onclick="return confirm('¿Estás seguro de borrar este usuario?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No hay usuarios registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="dashboard.php" class="back-button">Volver al Dashboard</a>
    </div>
</body>
</html>
