<?php
session_start();

if (!isset($_SESSION['correo_adm']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: formulario.php");
    exit();
}

require 'conexion.php';

$resultado = $conexion->query("SELECT * FROM newregistros");
$correoAdmin = $_SESSION['correo_adm'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="../estilos/listastl.css">
</head>
<body>

    <a href="cerrar_sesion.php" style="float: right;">Cerrar sesión</a>
    <h2>Lista de Estudiantes</h2>
    <p>Sesión iniciada como administrador: <?php echo htmlspecialchars($correoAdmin); ?></p>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Instrumento</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Inscripción</th>
        </tr>

        <?php while ($registros = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $registros["id_usuario"]; ?></td>
            <td><?php echo $registros["nombre"]; ?></td>
            <td><?php echo $registros["correo"]; ?></td>
            <td><?php echo $registros["instrumento"]; ?></td>
            <td><?php echo $registros["fecha_nac"]; ?></td>
            <td><?php echo $registros["fecha_insc"]; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
