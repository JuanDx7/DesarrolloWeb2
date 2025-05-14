<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    // No hay sesión activa
    header("Location: formulario.php");
    exit();
}

// Guardar el nombre en una variable y luego cerrar sesión
$nombreUsuario = $_SESSION['nombre'];
session_unset();    // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión completamente
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
    <p>Contenido exclusivo solo tras iniciar sesión.</p>
    <a href="formulario.php">Cerrar sesión</a>
</body>
</html>
