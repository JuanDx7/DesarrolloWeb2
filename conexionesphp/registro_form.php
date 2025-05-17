<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../estilos/estilo_rgs.css">
</head>
<body>
    <div class="background"></div>
    <div class="formulario-registro">
        <h2>Registro de Usuario</h2>
        <form action="procesar_reg.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required><br><br>

            <label>Correo electrónico:</label>
            <input type="email" name="correo" required><br><br>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required><br><br>

            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required onkeydown="return false;"><br><br>

            <label>Instrumento musical:</label>
            <select name="instrumento" required>
                <option value="" disabled selected>Seleccione Instrumento</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Piano">Piano</option>
                <option value="Batería">Batería</option>
                <option value="Saxofón">Saxofón</option>
                <option value="Violín">Violín</option>
            </select><br><br>

            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>
