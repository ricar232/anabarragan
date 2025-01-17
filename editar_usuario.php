<?php
require 'conexion.php';

// Verificar si se recibió el ID del usuario a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Consultar los datos del usuario
        $sql = "SELECT * FROM usuarios_registrados WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            die("Usuario no encontrado.");
        }
    } catch (PDOException $e) {
        die("Error al consultar el usuario: " . $e->getMessage());
    }
} else {
    header("Location: lista_usuarios.php");
    exit();
}

// Guardar cambios si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $seguro_social = $_POST['seguro_social'];
    $medicare = $_POST['medicare'];
    $medicaid = $_POST['medicaid'];
    $dr_primario = $_POST['dr_primario'];
    $id_pcp = $_POST['id_pcp'];
    $npi = $_POST['npi'];
    $plan_medico = $_POST['plan_medico'];

    try {
        // Actualizar los datos del usuario
        $sql = "UPDATE usuarios_registrados SET
                nombre = :nombre,
                fecha_nacimiento = :fecha_nacimiento,
                direccion = :direccion,
                telefono = :telefono,
                correo = :correo,
                seguro_social = :seguro_social,
                medicare = :medicare,
                medicaid = :medicaid,
                dr_primario = :dr_primario,
                id_pcp = :id_pcp,
                npi = :npi,
                plan_medico = :plan_medico
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':seguro_social', $seguro_social);
        $stmt->bindParam(':medicare', $medicare);
        $stmt->bindParam(':medicaid', $medicaid);
        $stmt->bindParam(':dr_primario', $dr_primario);
        $stmt->bindParam(':id_pcp', $id_pcp);
        $stmt->bindParam(':npi', $npi);
        $stmt->bindParam(':plan_medico', $plan_medico);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        header("Location: lista_usuarios.php?updated=1");
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar el usuario: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/editar_usuario.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="" method="POST">
            <label for="nombre">Nombre y Apellidos:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion']); ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>">

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>">

            <label for="seguro_social">Seguro Social:</label>
            <input type="text" id="seguro_social" name="seguro_social" value="<?php echo htmlspecialchars($usuario['seguro_social']); ?>">

            <label for="medicare">Medicare:</label>
            <input type="text" id="medicare" name="medicare" value="<?php echo htmlspecialchars($usuario['medicare']); ?>">

            <label for="medicaid">Medicaid:</label>
            <input type="text" id="medicaid" name="medicaid" value="<?php echo htmlspecialchars($usuario['medicaid']); ?>">

            <label for="dr_primario">Nombre del Dr. Primario:</label>
            <input type="text" id="dr_primario" name="dr_primario" value="<?php echo htmlspecialchars($usuario['dr_primario']); ?>">

            <label for="id_pcp">ID PCP:</label>
            <input type="text" id="id_pcp" name="id_pcp" value="<?php echo htmlspecialchars($usuario['id_pcp']); ?>">

            <label for="npi">NPI:</label>
            <input type="text" id="npi" name="npi" value="<?php echo htmlspecialchars($usuario['npi']); ?>">

            <label for="plan_medico">Plan Médico:</label>
            <input type="text" id="plan_medico" name="plan_medico" value="<?php echo htmlspecialchars($usuario['plan_medico']); ?>">

            <button type="submit" class="save-button">Guardar Cambios</button>
            <a href="lista_usuarios.php" class="back-button">Cancelar</a>
        </form>
    </div>
</body>
</html>
