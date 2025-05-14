<?php
// Datos servidor
$host = "localhost";
$usuario = "root";
$clave = "";
$db = "usuarioslogin";

// Conectando a MySQL
$conexion = new mysqli($host, $usuario, $clave, $db);

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Conexión Fallida: " . $conexion->connect_error);
}
?>