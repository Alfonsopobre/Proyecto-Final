<?php

include "conexion.php";

$valores = $_GET['valor'];

$cadena1 = "";
$cadena2 = "";
$cadena3 = "";

$sql1 = "SELECT * FROM marca";
$resultado1 = $conexion->query($sql1);
while ($row = $resultado1->fetch_assoc()){
    if ($valores[0] == $row['nombre']){

        $cadena1 .= "<option value='" . $row['idmarca'] . "'> " . $row['nombre'] . "</option selected>";
    }
    else{
        $cadena1 .= "<option value='" . $row['idmarca'] . "'> " . $row['nombre'] . "</option>";
    }
}

$sql2 = "SELECT * FROM tipo_producto";
$resultado2 = $conexion->query($sql2);
while ($row = $resultado2->fetch_assoc()){
    if ($valores[1] == $row['nombre']){

        $cadena2 .= "<option value='" . $row['idtipo_producto'] . "'> " . $row['nombre'] . "</option selected>";
    }
    else{
        $cadena2 .= "<option value='" . $row['idtipo_producto'] . "'> " . $row['nombre'] . "</option>";
    }
}

$sql3 = "SELECT * FROM proveedor";
$resultado3 = $conexion->query($sql3);
while ($row = $resultado3->fetch_assoc()){
    if ($valores[2] == $row['nombre']){

        $cadena3 .= "<option value='" . $row['idproveedor'] . "'> " . $row['nombre'] . "</option selected>";
    }
    else{
        $cadena3 .= "<option value='" . $row['idproveedor'] . "'> " . $row['nombre'] . "</option>";
    }
}

$respuesta = [$cadena1,$cadena2,$cadena3];
$json = json_encode($respuesta);
echo $json;
?>
