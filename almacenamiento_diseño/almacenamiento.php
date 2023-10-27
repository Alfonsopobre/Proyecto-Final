<?php
session_start();
if (empty($_SESSION["nombre"])) {
  header("location: inicio_sesion.php");
}
?>
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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <div class="container-row">
    <div class="row col-lg-3">
      <!-- barra de navegacion -->
      <nav id="navbar" class="navbar">
        <ul class="nav navbar-center">
          <li><a class="active" href="almacenamiento.php" class="ov-btn-grow-ellipse">
              <div class="letra">Almacenamiento</div>
            </a></li>
          <li><a href="alertap.php" class="ov-btn-grow-ellipse">
              <div class="letra">Alerta de productos</div>
            </a></li>
          <li><a href="empleados.php" class="ov-btn-grow-ellipse">
              <div class="letra">Empleados/Ventas</div>
            </a></li>
          <li><a href="inicio_sesion.php" class="ov-btn-grow-ellipse">
              <div class="letra">Regresar</div>
            </a></li>
        </ul>
        <div class="fond">
          <div class="carreaux_presentation_light" style="background-image:url(imagenes/Logo.jpeg);">
            <div class="shadow_swhow_mini">
              <div class="deroul_titre">Disfruta aquí</div>
              <div class="deroul_soustitre">¡Que refrescante!</div>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!--  -->
    <div class="row col-lg-9">
      <!-- Boton añadir producto -->
      <input type="checkbox" id="btn-modal">
      <label for="btn-modal" class="lbl-modal">
        <div id="boton_añadir">Añadir producto</div>
      </label>
      <div class="modal">
        <div class="contenedor" id="contenedor0">
          <header>Zona de Productos Nuevos</header>
          <label id="boton_cerrar" for="btn-modal"><img src="imagenes/error.png"></label>
          <div class="contenido" id="contenido0">
            <h2 id="emergente">Añadir productos</h2>
            <?php
            include "php/conexion.php";
            include "php/añadir_produ.php";
            ?>
            <form id="pantallita" method="POST">
              <br>
              <label for="nombre">Nombre:</label>
              <br>
              <input type="text" name="nombre" placeholder="Escribe Aqui">
              <br>
              <label for="cantidad">Cantidad:</label>
              <br>
              <input type="number" min="1" name="cantidad" placeholder="Escribe Aqui">
              <br>
              <label id="xid2" for="precio">Precio:</label>
              <br>
              <input type="number" min="1" name="precio" placeholder="Escribe Aqui">
              <br>
              <label id="xid1" for="marca">Marca:</label>
              <br>
              <select name="marca">
                <?php
                include "php/conexion.php";
                $query = "SELECT * FROM marca";
                $resultado = $conexion->query($query);
                if ($resultado->num_rows > 0) {
                  $num_rows = $resultado->num_rows;

                  for ($i = 0; $i < $num_rows; $i++) {
                    $row = $resultado->fetch_assoc();
                    echo "<option value='$row[idmarca]'>$row[nombre]</option>";
                  };
                }
                ?>
              </select>
              <br>
              <label for="tp_product">Tipo de producto:</label>
              <br>
              <select name="tp_product">
                <?php
                include "php/conexion.php";
                $query = "SELECT * FROM tipo_producto";
                $resultado = $conexion->query($query);
                if ($resultado->num_rows > 0) {
                  $num_rows = $resultado->num_rows;

                  for ($i = 0; $i < $num_rows; $i++) {
                    $row = $resultado->fetch_assoc();
                    echo "<option value='$row[idtipo_producto]'>$row[nombre]</option>";
                  };
                }
                ?>
              </select>
              <br>
              <label for="proveedor">Proveedor:</label>
              <br>
              <select name="proveedor">
                <?php
                include "php/conexion.php";
                $query = "SELECT * FROM proveedor";
                $resultado = $conexion->query($query);
                if ($resultado->num_rows > 0) {
                  $num_rows = $resultado->num_rows;

                  for ($i = 0; $i < $num_rows; $i++) {
                    $row = $resultado->fetch_assoc();
                    echo "<option value='$row[idproveedor]'>$row[nombre]</option>";
                  };
                }
                ?>
              </select>
              <br>
              <br>
              <input name="finalizar" type="submit" value="Añadir">
            </form>
          </div>
        </div>
        <!--  -->
      </div>
      <!-- Barra de busqueda -->
      <form class="searchbox" action="">
        <input id="txtbuscador" type="search" placeholder="Buscar..." />
        <button type="submit" id="buscar" value="search">&nbsp;</button>
      </form>
      <!--  -->
      <!-- Boton filtrar -->
      <button id="btn_filtrar"><img id="filtros" src="imagenes/filtrar.png"></button>
      <!--  -->
      <!-- Tabla -->
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
          $query = "SELECT * FROM productos";
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
          ?>
        </tbody>
      </table>
      <!--  -->
      <!-- Actualizar productos -->
      <div id="panel_oculto" class="panel">
        <button id="btn_cerrar_AP"><img src="imagenes/error.png"></button>
        <div class="panel-header">
          <h2>Actualizar Productos</h2>
        </div>
        <div class="panel-body">
          <form id="miFormulario" action="" method="post">
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
            <input id="campoPanelActualizar4" type="number" min="1" name="cantidad" placeholder="Escribe Aqui">
            <br>
            <label>Marca:</label>
            <br>
            <select name="mk" id="s_mk">
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
            <input name="actualizar" type="submit" value="Actualizar">
          </form>
        </div>
      </div>
      <!--  -->
      <!-- Panel de filtrado de datos -->
      <div id="panel_filtro" class="panel">
        <button id="btn_cerrar_F"><img src="imagenes/error.png"></button>
        <div class="panel-header">
          <h2>Filtros</h2>
        </div>
        <div id="cuerpo_panelF" class="panel-body">
          <button id="ventaMa">Mayor Venta</button>
          <button id="ventaE">Venta Estable</button>
          <button id="ventaMe">Menor Venta</button>
          <button id="inactivos">Ver Inactivos</button>
        </div>
      </div>
      <!--  -->
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

  <script src="java/almacenamiento.js"></script>
  <?php
  $conexion->close();
  ?>

</body>
</html>