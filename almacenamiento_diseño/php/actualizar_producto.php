<?php

include "conexion.php";

if (!empty($_POST["nombre"]) and !empty($_POST["cantidad"])) {

    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $cantidad=$_POST["cantidad"];
    $marca=$_POST["mk"];
    $tpp=$_POST["tpp"];
    $proveedor=$_POST["prove"];

    $sql0 = "UPDATE proveedor_producto SET proveedor='$proveedor' WHERE producto = $id";
    $conexion->query($sql0);
    $sql = "UPDATE productos SET nombre ='$nombre', cantidad = $cantidad, tipo_producto = $tpp , marca = $marca WHERE idproductos = $id";

    if ($conexion->query($sql) === TRUE) {

        echo "<div class='alert alert-info'>Se ha actualizado correctamente</div>"; 

    } else {

        echo "<div class='alert alert-danger'>Error en actualizar</div>";
    }
} else {

    echo "<div class='alert alert-info'>Campos Vacios</div>";
}


?>