<?php 
require 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $instrumentos = $_POST['instrumento']; 
    $fechaRegistro = date("Y-m-d H:i:s");
    
    // Validar que la fecha de nacimiento no sea posterior al 31-12-2015
    $fechaLimite = '2015-12-31';
    if ($fechaNacimiento > $fechaLimite) {
        echo "<script>alert('Por favor, ingrese una fecha de nacimiento válida (antes del 2016).');
         window.history.back();</script>";
        exit();  
    }

    // Eliminar vacíos (por si el usuario no seleccionó todos)
    $instrumentos_limpios = array_filter($instrumentos);

    // Quitar duplicados
    $instrumentos_unicos = array_unique($instrumentos_limpios);

    // Comparar cantidades, si no coinciden hay repetidos
    if (count($instrumentos_limpios) != count($instrumentos_unicos)) {
        echo "<script>alert('No puedes seleccionar el mismo instrumento más de una vez.');
         window.history.back();</script>";
        exit();
    } 

    // Verificar si el correo ya existe
    $verificar = "SELECT * FROM newregistros WHERE correo = '$correo'";
    $resultado = $conexion->query($verificar);

    if ($resultado->num_rows > 0) {
        echo "<script>alert('Ya existe una cuenta con ese correo.'); window.history.back();</script>";
    } else {
        // Insertar en newregistros (sin instrumento)
        $consulta = $conexion->prepare("INSERT INTO newregistros(nombre, correo, contrasena, fecha_nac, fecha_insc) 
                                        VALUES (?, ?, ?, ?, ?)");
        $consulta->bind_param("sssss", $nombre, $correo, $contrasena, $fechaNacimiento, $fechaRegistro);

        if ($consulta->execute()) {
            // Obtener el ID generado automáticamente
            $id_usuario = $conexion->insert_id;

            // Asignar los instrumentos (máx 3)
            $instrumento1 = isset($instrumentos[0]) ? $instrumentos[0] : null;
            $instrumento2 = isset($instrumentos[1]) ? $instrumentos[1] : null;
            $instrumento3 = isset($instrumentos[2]) ? $instrumentos[2] : null;

            // Insertar en usuarios_cursos
            $insertCurso = $conexion->prepare("INSERT INTO usuarios_cursos (id_usuario, nombre_usuario, fecha_inscripcion, 
            instrumento1, instrumento2, instrumento3) 
                                               VALUES (?, ?, ?, ?, ?, ?)");
            $insertCurso->bind_param("isssss", $id_usuario, $nombre, $fechaRegistro, $instrumento1, $instrumento2, $instrumento3);

            if ($insertCurso->execute()) {
                echo "<script>alert('¡Registro exitoso!'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Error al registrar cursos: " . $conexion->error . "');</script>";
            }

            $insertCurso->close();
        } else {
            echo "<script>alert('Error al registrar usuario: " . $conexion->error . "');</script>";
        }

        $consulta->close();
    }

    $resultado->close();
    $conexion->close();
}
?>
