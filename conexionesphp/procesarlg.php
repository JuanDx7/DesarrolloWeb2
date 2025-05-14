<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // 🟢 Iniciar sesión

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $bd = "SELECT * FROM newregistros WHERE correo = ?";
    $consulta = $conexion->prepare($bd);
    $consulta->bind_param("s", $correo);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($contrasena, $usuario['contrasena'])) {

            $_SESSION['nombre'] = $usuario['nombre'];


            header("Location: principal.php");
            exit();
        } else {
            echo "<script> alert('La contraseña es incorrecta.'); window.location.href = 'formulario.php';</script>";
            exit();
        }
    } else {
        echo "<script> alert('Correo no registrado.'); window.location.href = 'formulario.php';</script>";
        exit();
    }

    $consulta->close();
    $conexion->close();
}
?>
