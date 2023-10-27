<?php
if(!empty($_POST["boton_confirmar"])) {
    if (!empty($_POST["fecha_naci"]) and !empty($_POST["numero_iden"])) {
        $fecha=$_POST["fecha_naci"];
        $numero=$_POST["numero_iden"];
        $sql="SELECT * from usuarios where cedula='$numero' and fecha_naci='$fecha'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0){
            header("Location: new_contraseña.php?cedula=" . $numero);
        }
        else{
            echo "<div class='alert alert-info'>No coinciden los datos</div>";
        }
    } else {
        echo "<div class='alert alert-info'>Campos Vacios</div>";
    }
}
?>
