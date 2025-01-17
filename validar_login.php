<?php
require 'conexion.php'; // Asegúrate de que este archivo tiene la conexión correcta
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    try {
        // Consulta para buscar el usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Verificar si la contraseña es correcta
            if ($password === $resultado['contrasena']) { // Sin encriptar
                // Credenciales válidas, iniciar sesión
                $_SESSION['usuario'] = $resultado['usuario'];
                header("Location: dashboard.php");
                exit();
            } else {
                // Contraseña incorrecta
                header("Location: index.php?error=1");
                exit();
            }
        } else {
            // Usuario no encontrado
            header("Location: index.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    // Si el acceso no es por POST, redirigir al formulario
    header("Location: index.php");
    exit();
}
?>
