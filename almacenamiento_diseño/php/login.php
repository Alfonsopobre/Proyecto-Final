<?php
session_start();
if(!empty($_POST["ingresar"])) {
    if (!empty($_POST["correo"]) and !empty($_POST["contra"])) {
        $usuario=$_POST["correo"];
        $password=$_POST["contra"];
        $sql="SELECT * from usuarios where correo='$usuario' and contrasena='$password'";
        $resultado = $conexion->query($sql);
        if ($datos = $resultado->fetch_assoc()) {
            $_SESSION["id"]=$datos['idusuarios'];
            $_SESSION["nombre"]=$datos['nombre'];
            $_SESSION["cedula"]=$datos['cedula'];
            header("location: almacenamiento.php");    
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
    } else {
        echo "<div class='alert alert-info'>Campos Vacios</div>";
    }
}
?>