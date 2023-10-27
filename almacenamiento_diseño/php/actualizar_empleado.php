<?php

include "conexion.php";

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$cantidad = $_GET['cantidad'];

$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido' ,monto_inicial = '$cantidad' WHERE idusuarios = '$id';";

if ($conexion->query($sql) === TRUE){
    echo "1";
}
else{
    echo "2";
}
?>