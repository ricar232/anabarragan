<?php
require 'conexion.php';

// Recuperar los usuarios de la base de datos
$sql = "SELECT id, nombre, fecha_nacimiento, direccion, telefono, correo, seguro_social, medicare, medicaid, dr_primario, id_pcp, npi, plan_medico 
        FROM usuarios_registrados";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios Registrados</title>
    <link rel="stylesheet" href="css/lista_usuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="title"><i class="fas fa-users"></i> Lista de Usuarios Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Seguro Social</th>
                    <th>Medicare</th>
                    <th>Medicaid</th>
                    <th>Dr. Primario</th>
                    <th>ID PCP</th>
                    <th>NPI</th>
                    <th>Plan Médico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->rowCount() > 0): ?>
                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['fecha_nacimiento']) ?></td>
                            <td><?= htmlspecialchars($row['direccion']) ?></td>
                            <td><?= htmlspecialchars($row['telefono']) ?></td>
                            <td><?= htmlspecialchars($row['correo']) ?></td>
                            <td><?= htmlspecialchars($row['seguro_social']) ?></td>
                            <td><?= htmlspecialchars($row['medicare']) ?></td>
                            <td><?= htmlspecialchars($row['medicaid']) ?></td>
                            <td><?= htmlspecialchars($row['dr_primario']) ?></td>
                            <td><?= htmlspecialchars($row['id_pcp']) ?></td>
                            <td><?= htmlspecialchars($row['npi']) ?></td>
                            <td><?= htmlspecialchars($row['plan_medico']) ?></td>
                            <td>
                                <!-- Botones de acciones -->
                                <a href="editar_usuario.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="eliminar_usuario.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn-delete" 
                                   onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="14">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Dashboard</a>
    </div>
</body>
</html>
