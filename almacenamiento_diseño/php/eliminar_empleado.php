<?php

include "conexion.php";

$variable = $_GET["variable"];
$sql = "DELETE FROM usuarios WHERE nombre = '$variable' and rol = 2";

if ($conexion->query($sql) === TRUE){
    echo "1";
}
else{
    echo "2";
}
?>