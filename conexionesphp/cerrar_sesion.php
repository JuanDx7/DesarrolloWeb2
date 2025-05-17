<?php
session_start();
session_unset();   
session_destroy();  

header("Location: index.php"); // Redirige al formulario de inicio de sesión
exit();
?>
