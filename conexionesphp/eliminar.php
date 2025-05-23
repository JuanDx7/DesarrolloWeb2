<?php
session_start();

// Verificar que el usuario sea administrador
if (!isset($_SESSION['correo_adm']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require 'conexion.php';

// Validar que se reciba el ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = (int)$_GET['id'];

    // Preparar y ejecutar la consulta para eliminar
    $consulta = $conexion->prepare("DELETE FROM newregistros WHERE id_usuario = ?");
    $consulta->bind_param("i", $id_usuario);

    if ($consulta->execute()) {
        // Eliminado y redirigir a la lista
        header("Location: listausr.php?msg=Usuario+eliminado+correctamente");
        exit();
    } else {
        echo "Error al eliminar el usuario.";
    }

    $consulta->close();
} else {
    echo "ID de usuario no válido.";
}
?>
