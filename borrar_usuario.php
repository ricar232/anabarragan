<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $sql = "DELETE FROM usuarios_registrados WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: lista_usuarios.php?deleted=1');
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar el usuario: " . $e->getMessage();
    }
} else {
    header('Location: lista_usuarios.php');
    exit();
}
