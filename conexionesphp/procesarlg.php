<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            // ✅ Correcto, redirigir
            header("Location: paginaPrincipal.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script> alert('La contraseña es incorrecta.'); window.location.href = 'formulario.php';</script>";
            exit();
        }
    } else {
        // Correo no encontrado
        echo "<script> alert('Correo no registrado.'); window.location.href = 'formulario.php';</script>";
        exit();
    }

    $consulta->close();
    $conexion->close();
}
?>
