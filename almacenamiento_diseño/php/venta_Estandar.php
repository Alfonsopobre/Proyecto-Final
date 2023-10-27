<?php

include "conexion.php";

$sql = "SELECT * FROM productos WHERE vendidos > 10";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $row["idproductos"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["cantidad"] . "</td>";
            $i = $row["idproductos"];
            $query0 = "SELECT * FROM precio WHERE producto = $i";
            $resultado0 = $conexion->query($query0);
            $b;
            $fecha_mayor = 0;
            $c;
            $usuario_precio;
            while ($row0 = $resultado0->fetch_assoc()){
              $b = $row0['fecha_cambio'];
              if ($b > $fecha_mayor){
                $fecha_mayor = $b;
                $c = $row0['precio'];
                $usuario_precio = $row0['usuario'];
              }
            }
            $query00 = "SELECT * FROM usuarios WHERE idusuarios = $usuario_precio";
            $answer = $conexion->query($query00);
            while ($date = $answer->fetch_assoc()){
              $n_persona = strval($date['nombre']) . " " . strval($date['apellido']);
            }
            echo "<td>" . $c . "</td>";
            echo "<td>" . $fecha_mayor . "</td>";
            echo "<td>" . $n_persona . "</td>";
            $marca = intval($row["marca"]);
            $query1 = "SELECT * FROM marca Where idmarca = $marca";
            $resultado1 = $conexion->query($query1);
            foreach ($resultado1 as $markas) {
              echo "<td>" . $markas["nombre"] . "</td>";
            }
            $actividad_producto = $row["activo"];
            if ($actividad_producto == 1){
              echo "<td><b style='color: greenyellow;'>Activo</b></td>";
            }
            else
            {
              echo "<td><b>Inactivo</b></td>";
            }
            $tpp = intval($row["tipo_producto"]);
            $query2 = "SELECT * FROM tipo_producto Where idtipo_producto = $tpp";
            $resultado2 = $conexion->query($query2);
            foreach ($resultado2 as $tipo) {
              echo "<td>" . $tipo["nombre"] . "</td>";
            };
            echo "<td>" . $row['vendidos'] . "</td>";
            $query3 = "SELECT * FROM proveedor_producto Where producto = $i";
            $resultado3 = $conexion->query($query3);
            $id_prove;
            $actividad_proveedor;
            foreach ($resultado3 as $prov) {
              $id_prove = $prov["proveedor"];
            }
            $query4 = "SELECT * FROM proveedor Where idproveedor = $id_prove";
            $resultado4 = $conexion->query($query4);
            foreach ($resultado4 as $provee) {
              echo "<td>" . $provee["nombre"] . "</td>";
              $actividad_proveedor = $provee["activo"];
            }
            if ($actividad_proveedor == 1){
              echo "<td><b style='color: greenyellow;'>Activo</b></td>";
            }
            else
            {
              echo "<td><b>Inactivo</b></td>";
            }
            echo "<td> <a id='boton_actualizar' class='btn btn-info editar'>Editar</a></td>";
            echo "<td> <a id='eliminar' class='btn btn-danger'>Cambiar Estado</a></td>";
            echo "<td> <a id='cambiar_precio' class='btn btn-info precio'>Cambiar Precio</a></td>";
            echo "</tr>";
    }
}
$conexion->close();
?>