<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$nombreUsuario = $_SESSION['nombre']; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../estilos/pag_estilo.css">
</head>
<body>
    <div class="background"></div>
    <h1>Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?>!</h1>
    <p>Lo sentimos pero por el momento aún no iniciamos las clases. <br>
    Vuelve más tarde.</p>

    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>

