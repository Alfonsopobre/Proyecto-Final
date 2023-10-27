<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["finalizar"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["cantidad"]) and !empty($_POST["marca"]) and !empty($_POST["tp_product"]) and !empty($_POST["proveedor"])) {
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $fecha_hora_actual = date("Y-m-d H:i:s");
            $tp_producto = $_POST['tp_product'];
            $proveedor = $_POST['proveedor'];

            $query = "SELECT * FROM productos WHERE nombre = '$nombre' AND cantidad = '$cantidad' AND tipo_producto = '$tp_producto' AND marca = '$marca'";
            $respuesta = $conexion->query($query);
            if ($respuesta->num_rows > 0){
                echo "<div class='alert alert-info' id='campos_vacios'>Este producto ya existe</div>";
            }
            else
            {
                $sql = "INSERT INTO productos(nombre, cantidad, tipo_producto, marca, vendidos, activo) VALUES ('$nombre', '$cantidad', '$tp_producto', '$marca', 0, 1)";
                $resultado0 = $conexion->query($sql);
                $sql0 = "SELECT * FROM productos WHERE nombre = '$nombre' AND cantidad = '$cantidad' AND tipo_producto = '$tp_producto' AND marca = '$marca'";
                $resultado1 = $conexion->query($sql0);
                $producto = "";
                while ($row = $resultado1->fetch_assoc()){
                    $producto = $row["idproductos"];
                }
                echo $producto;
                $sql1 = "INSERT INTO proveedor_producto(producto, proveedor) VALUES ('$producto','$proveedor')";
                $conexion->query($sql1);
                $responsable = $_SESSION["id"];
                echo $responsable;
                $sql2 = "INSERT INTO precio(precio,fecha_cambio,activo,producto,usuario) VALUES ('$precio', '$fecha_hora_actual', 1, '$producto', '$responsable')";
                if ($conexion->query($sql2) === TRUE) {
                    echo "Registro agregado con éxito";
                    header("Location: almacenamiento.php");
                } else {
                    echo "Error: " . $sql1 . "<br>" . $conexion->error;
                }
            
                // Cerrar la conexión
                $conexion->close();
            }

            
        } else {
            echo "<div class='alert alert-info' id='campos_vacios'>Campos Vacios</div>";
        }
    }
}


?>