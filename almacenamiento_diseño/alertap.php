<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="estilos/estilo_almacenamiento.css">
</head>
<body>
    <div class="container-row">
        <div class="row col-lg-3">
            <nav id="navbar" class="navbar">
                <ul  class="nav navbar-center">
                    <li><a href="almacenamiento.php" class="ov-btn-grow-ellipse"> <div class="letra">Almacenamiento</div></a></li>
                    <li><a  class="active" href="alertap.php" class="ov-btn-grow-ellipse"> <div class="letra">Alerta de productos</div></a></li>
                    <li><a href="empleados.php" class="ov-btn-grow-ellipse"> <div class="letra">Empleados/Ventas</div></a></li>
                    <li><a href="inicio_sesion.php" class="ov-btn-grow-ellipse"> <div class="letra">Regresar</div></a></li>
                </ul>
                <div class="fond">
                    <div class="carreaux_presentation_light" style="background-image:url(imagenes/Logo.jpeg);">
                      <div class="shadow_swhow_mini">
                          <div class="deroul_titre">Disfruta aquí</div>
                          <div class="deroul_soustitre">!Que refrescante¡</div>
                      </div>
                    </div> 
                </div>
            </nav>
        </div>
        <div class="row col-lg-9">
          <h1 id="titulo1">Productos en Estado de Agotamiento</h1>
          <table id="tabla" class="default">
            <tr>
            <th>Id</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Modificación</th>
            <th>Responsable</th>
            <th>Marca</th>
            <th>Estado producto</th>
            <th>Tipo de producto</th>
            <th>Vendidos</th>
            <th>Proveedor</th>
            <th>Estado proveedor</th>
            <th id="opciones" colspan="3">Opciones</th>
          </tr>
          <tbody>
            <?php
            include "php/conexion.php";
            $query = "SELECT * FROM productos where vendidos < 10";
            $resultado = $conexion->query($query);
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
                echo "<td><b'>Inactivo</b></td>";
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
              if ($actividad_proveedor === 1){
                echo "<td><b style='color: greenyellow;'>Activo</b></td>";
              }
              else
              {
                echo "<td><b'>Inactivo</b></td>";
              }
              echo "<td> <a id='boton_actualizar' class='btn btn-info editar'>Editar</a></td>";
              echo "<td> <a id='eliminar' class='btn btn-danger'>Cambiar Estado</a></td>";
              echo "<td> <a id='cambiar_precio' class='btn btn-info precio'>Cambiar Precio</a></td>";
              echo "</tr>";
            }
            ?>
            </tbody>
          </table>
          <div id="panel_oculto" class="panel">
            <button id="btn_cerrar_AP"><img src="imagenes/error.png"></button>
            <div class="panel-header">
              <h2>Actualizar Productos</h2>
            </div>
            <div class="panel-body">
              <form id="Formulario" action="" method="post">
                <span id="avisos"></span>
                <label>Id:</label>
                <br>
                <input id="campoPanelActualizar1" type="number" min="1" name="id" placeholder="Escribe Aqui" readonly>
                <br>
                <label>Nombre:</label>
                <br>
                <input id="campoPanelActualizar2" type="text" name="nombre" placeholder="Escribe Aqui">
                <br>
                <label>Cantidad:</label>
                <br>
                <input id="campoPanelActualizar5" type="number" min="1" name="cantidad" placeholder="Escribe Aqui">
                <br>
                <label>Marca:</label>
                <br>
                <select name="mk" id="s_mk">
                  <option value=""></option>
                </select>
                <br>
                <label>Tipo producto:</label>
                <br>
                <select name="tpp" id="s_tpp">
                </select>
                <br>
                <label>Proveedor:</label>
                <br>
                <select name="prove" id="s_prove">
                </select>
                <br>
                <input type="submit" value="Actualizar">
              </form>
            </div>
          </div>
          <div id="panel_eliminar" class="panel">
            <button id="btn_cerrar_eliminar"><img src="imagenes/error.png"></button>
            <div class="panel-header">
              <h2>Advertencia</h2>
            </div>
            <div class="panel-body">
              <p id="informacion" ></p>
              <button id="boton_confirmar" >ACEPTAR</button>
            </div>
            <p id="aviso_eliminar"></p>
          </div>
          <div id="panel_actualizar_precio" class="panel">
            <button id="btn_cerrar_actualizar_precio"><img src="imagenes/error.png"></button>
            <div class="panel-header">
              <h4>Se va a cambiar el precio al siguiente producto</h4>
              <span id="n_producto"></span>
            </div>
            <div class="panel-body">
              <input id="valor_precio" type="number" min="1" placeholder="Escribe Aqui">
              <br><br>
              <button id="boton_actualizar_precio">Actualizar Precio</button>
            </div>
          </div>
        </div>
      </div>
    </div> 
<script src="java/alertap.js"></script>
</body>
</html>