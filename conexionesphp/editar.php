<?php
session_start();

// Verificar que el usuario sea administrador
if (!isset($_SESSION['correo_adm']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require 'conexion.php';

if (!isset($_GET['id'])) {
    echo "ID de usuario no proporcionado.";
    exit();
}

$id = $_GET['id'];

// Si se envió el formulario, procesamos la actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $fecha_nac = $_POST['fecha_nac'];

    $consulta = $conexion->prepare("UPDATE newregistros SET nombre=?, correo=?, fecha_nac=? WHERE id_usuario=?");
    $consulta->bind_param("sssi", $nombre, $correo, $fecha_nac, $id);

    if ($consulta->execute()) {
        header("Location: listausr.php?mensaje=actualizado");
        exit();
    } else {
        echo "Error al actualizar: " . $consulta->error;
    }

    $consulta->close();
}

// Obtener los datos del usuario actual
$consulta_usr = $conexion->prepare("SELECT * FROM newregistros WHERE id_usuario = ?");
$consulta_usr->bind_param("i", $id);
$consulta_usr->execute();
$resultado = $consulta_usr->get_result();

if ($resultado->num_rows === 0) {
    echo "Usuario no encontrado.";
    exit();
}

$usuario = $resultado->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
        <link rel="stylesheet" href="../estilos/estilo_editar.css">
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required><br><br>

        <label>Fecha de Nacimiento:</label><br>
        <input type="date" name="fecha_nac" value="<?php echo htmlspecialchars($usuario['fecha_nac']); ?>" required><br><br>

        <input type="submit" value="Actualizar">
        <a href="listausr.php">Cancelar</a>
    </form>
</body>
</html>
