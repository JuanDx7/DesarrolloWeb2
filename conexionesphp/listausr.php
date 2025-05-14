<?php
   require 'conexion.php';
   $resultado = $conexion->query("SELECT * FROM usuarios_music");
?>

<h2>Lista de Estudiantes</h2>

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