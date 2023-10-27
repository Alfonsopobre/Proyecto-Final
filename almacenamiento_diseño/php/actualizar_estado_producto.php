<?php

include "conexion.php";

$nombre = $_GET["variable0"];
$estado = $_GET["variable1"];
if ($estado == "Activo"){
    $sql = "UPDATE productos SET activo = 0 where nombre = '$nombre'";
    if ($conexion->query($sql) === TRUE){
        echo "1";
    }
    else{
        echo "2";
    }
}
else{
    $sql = "UPDATE productos SET activo = 1 where nombre = '$nombre'";
    if ($conexion->query($sql) === TRUE){
        echo "1";
    }
    else{
        echo "2";
    }
}



?>