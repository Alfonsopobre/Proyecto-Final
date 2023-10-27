<?php

include "conexion.php";
$nombre= $_GET['dato1'];
$apellido= $_GET['dato2'];
$correo= $_GET['dato3'];
$monto= $_GET['dato4'];

$sql = "INSERT INTO usuarios(nombre,apellido,correo,rol,monto_inicial,activo) VALUES ('$nombre','$apellido','$correo',2,$monto,1)";

if ($conexion->query($sql) === TRUE){
    echo "1";
}
else
{
    echo "2";
}
?>