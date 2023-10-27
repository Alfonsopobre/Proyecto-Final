<?php

include "conexion.php";
session_start(); 

$id = $_GET['variable0'];
$precio = $_GET['variable1'];
$fechaYHora = date("Y-m-d H:i:s");
$responsable = intval($_SESSION["id"]);
$sql = "INSERT INTO precio(precio,fecha_cambio,producto,usuario) VALUES ('$precio', '$fechaYHora', '$id', '$responsable')";

if ($conexion->query($sql) === TRUE){
    echo "1";
}
else
{
    echo "2";
}
?>