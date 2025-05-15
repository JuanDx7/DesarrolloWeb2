<?php
session_start();
session_unset();   
session_destroy();  

header("Location: formulario.php"); // Redirige al formulario de inicio de sesión
exit();
?>
