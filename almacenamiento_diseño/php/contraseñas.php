<?php

include "conexion.php";

if(!empty($_POST["boton"])) {
    if (!empty($_POST["password1"]) and !empty($_POST["password2"])) {
        $pass1=$_POST["password1"];
        $pass2=$_POST["password2"];
        if ($pass1 == $pass2){
            $sql = "UPDATE usuarios SET contrasena = '$pass1' WHERE cedula = '$cedula'";
            $conexion->query($sql);
            header("Location: inicio_sesion.php");
        }
        else{
            echo "<div class='alert alert-info'>No coinciden los datos</div>";
        }
    } else {
        echo "<div class='alert alert-info'>Campos Vacios</div>";
    }
}

?>