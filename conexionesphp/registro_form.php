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
        <form id="formRegistro" action="procesar_reg.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required><br><br>

            <label>Correo electrónico:</label>
            <input type="email" name="correo" required><br><br>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required><br>
            <small>La contraseña debe tener al menos 8 caracteres, <br>
                   1 mayúscula, 1 número y <br>
                   1 signo de puntuación (. , ; : ! ¿ ? @ # $ % & *)<br> </small>
            <div id="errorContrasena" class="mensaje-error">Contraseña no cumple los requisitos.</div>
            <br>

            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required onkeydown="return false;"><br><br>

            <label>Indique el/los cursos que desea tomar.:</label>
            <select name="instrumento[]" required>
                <option value="">Seleccione Instrumento</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Piano">Piano</option>
                <option value="Batería">Batería</option>
                <option value="Saxofón">Saxofón</option>
                <option value="Violín">Violín</option>
            </select><br><br>

            <label>(Opcional):</label>
            <select name="instrumento[]">
                <option value="">Seleccione Instrumento</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Piano">Piano</option>
                <option value="Batería">Batería</option>
                <option value="Saxofón">Saxofón</option>
                <option value="Violín">Violín</option>
            </select><br><br>

            <label>(Opcional):</label>
            <select name="instrumento[]">
                <option value="">Seleccione Instrumento</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Piano">Piano</option>
                <option value="Batería">Batería</option>
                <option value="Saxofón">Saxofón</option>
                <option value="Violín">Violín</option>
            </select><br><br>

            <input type="submit" value="Registrarse">
        </form>
    </div>

    <script>
    // Validación de contraseña al enviar el formulario
    const form = document.getElementById('formRegistro');
    const contrasenaInput = document.getElementById('contrasena');
    const errorContrasena = document.getElementById('errorContrasena');

    form.addEventListener('submit', function(e) {
        const contrasena = contrasenaInput.value;

        // Validar los requisitos:
        const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[.,;:!¿?@#$%&*])[A-Za-z\d.,;:!¿?@#$%&*]{8,}$/;

        if (!regex.test(contrasena)) {
            e.preventDefault(); // Detener envío
            errorContrasena.style.display = 'block';
            contrasenaInput.focus();
        } else {
            errorContrasena.style.display = 'none';
        }
    });

    </script>
</body>
</html>
