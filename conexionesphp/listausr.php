<?php
session_start();

if (!isset($_SESSION['correo_adm']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: index.php");
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
    <link rel="stylesheet" href="../estilos/lista_estilo.css">
</head>
<body>
    <a href="cerrar_sesion.php" class="cerrar-sesion">Cerrar sesión</a>
   
    <h2>Lista de Estudiantes</h2>
    <p>Sesión iniciada como administrador: <?php echo htmlspecialchars($correoAdmin); ?></p>

    <!-- Ingresar nuevo usuario -->
    <p><a href="registro_form.php" class="nuevo-usuario">Agregar Nuevo Usuario</a></p>

    <table class="tabla-registros" border="1" cellpadding="5"> 
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Inscripción</th>
            <th>Actualizar</th>  
            <th>Eliminar</th>  
        </tr>
        </thead>
        
        <tbody>
        <?php while ($registros = $resultado->fetch_assoc()) { ?>
            
        <tr>
            <td><?php echo $registros["id_usuario"]; ?></td>
            <td><?php echo $registros["nombre"]; ?></td>
            <td><?php echo $registros["correo"]; ?></td>
            <td><?php echo $registros["fecha_nac"]; ?></td>
            <td><?php echo $registros["fecha_insc"]; ?></td>

            <td><a href="editar.php?id=<?php echo $registros['id_usuario']; ?>" 
            class="editar">Editar</a></td>

            <td><a href="eliminar.php?id=<?php echo $registros['id_usuario']; ?>"
            class="eliminar"
            onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

</body>
</html>
