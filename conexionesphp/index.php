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
  <div class="Formulario" >
         <h2>Iniciar Sesión</h2>
    <form action="procesar_logn.php" method="POST">
        <label>Correo:</label>
        <input type="email" name="correo" required><br><br>
        
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>
        <input type="submit" value="Entrar">
        <p>
          ¿No tienes cuenta? <a href="registro_form.php">Regístrate ahora</a>
        </p>
    </form>
  </div> 

</body>
</html>
