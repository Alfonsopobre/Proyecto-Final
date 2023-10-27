<?php
$conexion=new mysqli("localhost","root","","almacenamiento");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>