<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $instrumento = $_POST['instrumento'];
    $fechaRegistro = date("Y-m-d H:i:s");

    // Verificar si el correo ya existe
    $verificar = "SELECT * FROM newregistros WHERE correo = '$correo'";
    $resultado = $conexion->query($verificar);

    if ($resultado->num_rows > 0) {
        echo "<script>alert('Ya existe una cuenta con ese correo.'); window.history.back();</script>";
    } else {
        // Usar sentencias preparadas para seguridad
        $consulta = $conexion->prepare("INSERT INTO newregistros(nombre, correo, contrasena, fecha_nac, instrumento, fecha_insc) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("ssssss", $nombre, $correo, $contrasena, $fechaNacimiento, $instrumento, $fechaRegistro);

        if ($consulta->execute()) {
            echo "<script>alert('¡Registro exitoso!'); window.location.href = 'formulario.php';</script>";
        } else {
            echo "<script>alert('Error al registrar: " . $conexion->error . "');</script>";
        }
        $consulta->close();
    }

    $resultado->close();
    $conexion->close();
}
?>
