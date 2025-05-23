<?php
require 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $curso_seleccionado = strtolower($_POST['curso']);  // Curso elegido por el usuario

    // Buscar en tabla admin_lg
    $sql_admin = "SELECT * FROM admin_lg WHERE correo = ?";
    $consulta_admin = $conexion->prepare($sql_admin);
    $consulta_admin->bind_param("s", $correo);
    $consulta_admin->execute();
    $resultado_admin = $consulta_admin->get_result();

    if ($resultado_admin->num_rows === 1) {
        $admin = $resultado_admin->fetch_assoc();

        if (password_verify($contrasena, $admin['contrasena'])) {
            $_SESSION['correo_adm'] = $admin['correo']; 
            $_SESSION['tipo'] = 'admin';

            header("Location: listausr.php");
            exit();
        } else {
            echo "<script> alert('Contraseña incorrecta.'); window.location.href = 'index.php';</script>";
            exit();
        }
    }

    $resultado_admin->close();

    // Si no es admin, buscar usuario normal en newregistros
    $sql_user = "SELECT * FROM newregistros WHERE correo = ?";
    $consulta_user = $conexion->prepare($sql_user);
    $consulta_user->bind_param("s", $correo);
    $consulta_user->execute();
    $resultado_user = $consulta_user->get_result();

    if ($resultado_user->num_rows === 1) {
        $user = $resultado_user->fetch_assoc();

        if (password_verify($contrasena, $user['contrasena'])) {
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['tipo'] = 'user';
            $_SESSION['id_usuario'] = $user['id_usuario'];

            // Buscar los cursos que tiene asignados el usuario
            $sql_cursos = "SELECT * FROM usuarios_cursos WHERE id_usuario = ?";
            $consulta_cursos = $conexion->prepare($sql_cursos);
            $consulta_cursos->bind_param("i", $user['id_usuario']);
            $consulta_cursos->execute();
            $resultado_cursos = $consulta_cursos->get_result();

            $encontrado = false;
            while ($fila = $resultado_cursos->fetch_assoc()) {
              if (strtolower($fila['instrumento1']) === $curso_seleccionado ||
                 strtolower($fila['instrumento2']) === $curso_seleccionado ||
                 strtolower($fila['instrumento3']) === $curso_seleccionado) {
                 $encontrado = true;
             break;
                }
            }

            if ($encontrado) {
                switch ($curso_seleccionado) {
                    case 'guitarra':
                        header("Location: ../contenido/principal_guitarra.php");
                        break;
                    case 'piano':
                        header("Location: ../contenido/principal_piano.php");
                        break;
                    case 'batería':
                        header("Location: ../contenido/principal_bateria.php");
                        break;
                    case 'saxofón':
                        header("Location: ../contenido/principal_saxofon.php");
                        break;
                    case 'violín':
                        header("Location: ../contenido/principal_violin.php");
                        break;
                    default:
                        echo "<script>alert('Instrumento no reconocido.'); window.location.href = 'index.php';</script>";
                        break;
                }
                exit();
            } else {
                echo "<script>alert('Este curso no está asignado a tu cuenta.'); window.location.href = 'index.php';</script>";
                exit();
            }

        } else {
            echo "<script> alert('La contraseña es incorrecta.'); window.location.href = 'index.php';</script>";
            exit();
        }
    } else {
        echo "<script> alert('Correo no registrado.'); window.location.href = 'index.php';</script>";
        exit();
    }

    $resultado_user->close();
    $conexion->close();
}
?>
