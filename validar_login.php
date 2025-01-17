<?php
// Habilitar la visualización de errores (solo para depuración; desactiva en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión a la base de datos
require 'conexion.php';

// Verificar que los datos del formulario se reciban correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $usuario = trim($_POST['usuario']); // Eliminar espacios en blanco adicionales
    $password = trim($_POST['password']);

    try {
        // Preparar la consulta para buscar al usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Verificar la contraseña (utilizando password_verify si está encriptada)
            if (password_verify($password, $resultado['contrasena'])) {
                // Inicio de sesión exitoso: Redirigir al dashboard o página principal
                session_start(); // Iniciar sesión
                $_SESSION['usuario'] = $resultado['usuario']; // Guardar datos del usuario en la sesión
                header("Location: dashboard.php");
                exit(); // Detener la ejecución después de redirigir
            } else {
                // Contraseña incorrecta: Redirigir al login con mensaje de error
                header("Location: index.php?error=1");
                exit();
            }
        } else {
            // Usuario no encontrado: Redirigir al login con mensaje de error
            header("Location: index.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        // Manejar errores de base de datos
        error_log("Error en la base de datos: " . $e->getMessage()); // Registrar el error en el log del servidor
        header("Location: index.php?error=2"); // Error genérico en la base de datos
        exit();
    }
} else {
    // Si el acceso no es por POST, redirigir al formulario de login
    header("Location: index.php");
    exit();
}
?>
