<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: formulario.php");
    exit();
}

$nombreUsuario = $_SESSION['nombre']; // Solo obtenemos el nombre, sin destruir la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../estilos/pagstilo.css">
</head>
<body>
    <div class="background"></div>
    <h1>Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?>!</h1>
    <p>Lo sentimos pero por el momento aún estamos trabajando en el contenido. <br>
    Vuelve más tarde.</p>

    <!-- Este enlace lleva al archivo que cierra la sesión -->
    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>

