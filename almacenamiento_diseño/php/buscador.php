<?php

include "conexion.php";

$variable = $_GET['variable'];

$sql = "SELECT productos.idproductos as id, productos.nombre as producto, productos.cantidad as cantidad, precio.precio, precio.fecha_cambio, usuarios.nombre as nombre_usuario, usuarios.apellido as apellido_usuario, marca.nombre as marca, productos.activo as estado_producto, tipo_producto.nombre as tipo_producto, productos.vendidos as vendidos, proveedor.nombre as proveedor, proveedor.activo as estado_proveedor FROM precio INNER JOIN productos ON precio.producto = productos.idproductos inner join marca on productos.marca = marca.idmarca inner join tipo_producto on productos.tipo_producto = tipo_producto.idtipo_producto inner join proveedor_producto on productos.idproductos = proveedor_producto.producto INNER join proveedor on proveedor_producto.proveedor = proveedor.idproveedor INNER JOIN usuarios on precio.usuario = usuarios.idusuarios Where productos.nombre LIKE '%$variable%' order by precio.fecha_cambio DESC;";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["producto"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["fecha_cambio"] . "</td>";
        $nombre_usuario = $row["nombre_usuario"] . " " . $row["apellido_usuario"];
        echo "<td>" . $nombre_usuario . "</td>";
        echo "<td>" . $row["marca"] . "</td>";
        $actividad_producto = $row["estado_producto"];
        if ($actividad_producto == 1){
            echo "<td><b style='color: greenyellow;'>Activo</b></td>";
        }
        else
        {
          echo "<td><b>Inactivo</b></td>";
        }
        echo "<td>" . $row["tipo_producto"] . "</td>";
        echo "<td>" . $row['vendidos'] . "</td>";
        echo "<td>" . $row["proveedor"] . "</td>";
        if ($row["estado_proveedor"] == 1){
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
} else {
    echo "<tr><td colspan='12'>No se encontraron productos con el nombre '$variable'.</td></tr>";
}

$conexion->close();
?>