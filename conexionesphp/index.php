<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../estilos/estilo_sesn.css">
</head>
<body>
<div class="background"></div>
<h1>Music Class</h1>
<div class="Formulario">
    <h2>Iniciar Sesión</h2>
    <form action="procesar_logn.php" method="POST">
        <label>Correo:</label>
        <input type="email" name="correo" inputmode="email" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" inputmode="text" required><br><br>

        <label>Selecciona el curso:</label>
        <select name="curso">
            <option value="" disabled selected>Instrumento</option>
            <option value="Guitarra">Guitarra</option>
            <option value="Piano">Piano</option>
            <option value="Batería">Batería</option>
            <option value="Saxofón">Saxofón</option>
            <option value="Violín">Violín</option>
        </select><br><br>

        <input type="submit" value="Entrar">
        <p>¿No tienes cuenta? <a href="registro_form.php">Regístrate ahora</a></p>
    </form>
    </div>
  </body>
</html>
