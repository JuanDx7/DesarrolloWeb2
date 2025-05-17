<?php
require 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Buscar en tabla admin_lg
    $sql_admin = "SELECT * FROM admin_lg WHERE correo = ?";
    $stmt_admin = $conexion->prepare($sql_admin);
    $stmt_admin->bind_param("s", $correo);
    $stmt_admin->execute();
    $resultado_admin = $stmt_admin->get_result();

    if ($resultado_admin->num_rows === 1) {
        $admin = $resultado_admin->fetch_assoc();

        if (password_verify($contrasena, $admin['contrasena'])) {
            $_SESSION['correo_adm'] = $admin['correo'];  // o el campo que uses
            $_SESSION['tipo'] = 'admin';

            header("Location: listausr.php");
            exit();
        }   else {
            echo "<script> alert('Contraseña incorrecta.'); window.location.href = 'index.php';</script>";
            exit();
        } 
    } 

    // Si no es admin, buscar en newregistros (usuarios normales)
    $sql_user = "SELECT * FROM newregistros WHERE correo = ?";
    $stmt_user = $conexion->prepare($sql_user);
    $stmt_user->bind_param("s", $correo);
    $stmt_user->execute();
    $resultado_user = $stmt_user->get_result();

    if ($resultado_user->num_rows === 1) {
        $user = $resultado_user->fetch_assoc();

        if (password_verify($contrasena, $user['contrasena'])) {
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['tipo'] = 'user';

            header("Location: principal.php");
            exit();
        } else {
            echo "<script> alert('La contraseña es incorrecta.'); window.location.href = 'index.php';</script>";
            exit();
        }
    } else {
        echo "<script> alert('Correo no registrado.'); window.location.href = 'index.php';</script>";
        exit();
    }
    
}
?>