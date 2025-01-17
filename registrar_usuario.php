<?php
// Incluir la conexión a la base de datos
require 'conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
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
        // Preparar la consulta SQL
        $sql = "INSERT INTO usuarios (nombre, fecha_nacimiento, direccion, telefono, correo, seguro_social, medicare, medicaid, dr_primario, id_pcp, npi, plan_medico)
                VALUES (:nombre, :fecha_nacimiento, :direccion, :telefono, :correo, :seguro_social, :medicare, :medicaid, :dr_primario, :id_pcp, :npi, :plan_medico)";

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

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir al Dashboard con un mensaje de éxito
        header('Location: agregar_usuario.php?success=1');
        exit();
    } catch (PDOException $e) {
        // Mostrar error si algo falla
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
} else {
    // Redirigir al formulario si se intenta acceder directamente
    header('Location: agregar_usuario.php');
    exit();
}
?>
