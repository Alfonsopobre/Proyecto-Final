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
          <nav id="navbar" class="navbar">
              <ul  class="nav navbar-center">
                  <li><a href="almacenamiento.php" class="ov-btn-grow-ellipse"> <div class="letra">Almacenamiento</div></a></li>
                  <li><a href="alertap.php" class="ov-btn-grow-ellipse"> <div class="letra">Alerta de productos</div></a></li>
                  <li><a class="active" href="empleados.php" class="ov-btn-grow-ellipse"> <div class="letra">Empleados/Ventas</div></a></li>
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
      <div class="row col-lg-5 fila">
        <h1 id="titulo0">Empleados</h1>
        <table id="tabla" class="default">
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Cantidad inicial</th>
              <th>Activo</th>
              <th id="opciones" colspan="2">Opciones</th>
            </tr>
            <tbody>
            <?php 
              include "php/conexion.php";
              $query = "SELECT * FROM usuarios where rol=2";
              $resultado = $conexion->query($query);
              while ($row = $resultado->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["idusuarios"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "<td>" . $row["monto_inicial"] . "</td>";
                $activo = $row["activo"];
                if ($activo == 1){
                  echo "<td><b style='color: greenyellow;'>Activo</b></td>";
              }
              else
              {
                  echo "<td><b>Inactivo</b></td>";
              }
                echo "<td> <a id='boton_actualizar' class='btn btn-info'>Editar</a></td>";
                echo "<td> <a id='eliminar' class='btn btn-danger'>Cambiar Estado</a></td>";
                echo "</tr>";
              }
            ?>
            </tbody>
        </table>
        <input type="checkbox" id="btn-modal">
        <label for="btn-modal" class="lbl-modal1"><div id="boton_añadirE">Añadir Empleados</div></label>
        <div class="modal" id="modal0">
          <div class="contenedor" id="contenedor0">
            <header>Zona de Registro Empleados</header>
            <label id="boton_cerrar" for="btn-modal"><img src="imagenes/error.png"></label>
            <div class="contenido" id="contenido0">
              <h2 id="emergente">Registro</h2>
              <p> 
                <form id="pantallita0" action="">
                  <span id="aviso_registroEmpleados"></span>
                  <br>
                  <label for="nombre">Nombre:</label>
                  <br>
                  <input id="nombreEmpleado" type="text" name="nombre" placeholder="Escribe Aqui">
                  <br>
                  <label id="apellido" for="apellido">Apellido:</label>
                  <br>
                  <input id="apellidoEmpleado" type="text" name="apellido" placeholder="Escribe Aqui">
                  <br>
                  <label id="xid" for="id">Correo:</label>
                  <br>
                  <input id="correoEmpleado" type="text" name="correo" placeholder="Escribe Aqui">
                  <br>
                  <label for="cantidad">Cantidad inicial:</label>
                  <br>
                  <input id="cantidadEmpleado" type="number" min="1" name="cantidad" placeholder="Escribe Aqui">
                  <br>
                  <br>
                  <input id="añadirEmpleado" type="submit" value="Añadir">
                </form>
              </p>
            </div>
          </div>
        </div>
        <button id="g_v">Generar Venta</button>
        <button id="t_e">Total de los empleados</button>
        <button id="a_p">Añadir proveedor</button>
        <div class="container-row">
          <div class="row col-lg-7">
            <form id="generarVenta" action="" method="post">
              <button id="cerrar_venta"><img src="imagenes/error.png"></button>
              <div class="form-header">
                <h1>Zona de Ventas</h1>
              </div>
              <div class="container-row">
                <div class="row col-lg-6">
                  <br>
                  <label >Nombre del Empleado:</label>
                  <br><br>
                  <label >Nombre del Producto:</label>
                  <br><br>
                  <label >Cantidad:</label>
                  <br><br>
                </div>
                <div class="row col-lg-6">
                  <br>
                  <input type="text" name="empleado_venta" placeholder="Escribe Aqui">
                  <br><br>
                  <input type="text" name="cantidad_venta" placeholder="Escribe Aqui">
                  <br><br>
                  <input type="number" name="cantidad_venta" min="1" placeholder="Escribe Aqui">
                  <br><br>
                </div>
              </div>
              <div class="form-footer">
                <input id="enviar_venta" type="submit" value="Finalizar">
              </div>
            </form>

            <form id="form_consultar" action="" method="post">
              <button id="cerrar_formtotal"><img src="imagenes/error.png"></button>
              <div class="form-header">
                <h1>Total final de cada empleado</h1>
              </div>
              <br>
              <label for="empleados">Elige el empleado:</label>
              <select name="empleados" id="select_empleados">
                <option value="">marlon</option>
                <option value="">sebas</option>
                <option value="">liseth</option>
              </select>
              <br><br>
              <input id="buscar_empleado" type="button" value="Buscar">
              <br><br>
              <input type="text" placeholder="Resultados Aqui" readonly>
            </form>
          </div>
          </div>
          <div class="row col-lg-5">
            <form id="form_prove"action="" method="post">
              <button id="cerrar_provee"><img src="imagenes/error.png"></button>
              <div class="form-header">
                <h1>Añadir proveedor</h1>
              </div>
              <label for="proveedor">Nuevo Proveedor:</label>
              <input type="text" name="proveedor" placeholder="Escribe Aqui">
              <br><br>
              <input id="añadir_proveedor"type="button" value="Agregar">
              <input id="añadir_proveedor"type="button" value="Habilitar">
              <input id="añadir_proveedor"type="button" value="Desabilitar">
            </form>
            <div id="panel_oculto" class="panel">
              <button id="btn_cerrar_AP"><img src="imagenes/error.png"></button>
                <div class="panel-header">
                  <h2>Actualizar Empleados</h2>
                </div>
                <div class="panel-body">
                  <form id="" action="">
                    <span id="aviso_actualizar"></span>
                    <label>Id:</label><br>
                    <input id="campoPanelActualizar1" type="number" min="1" name="cc" placeholder="Escribe Aqui" readonly>
                    <br>
                    <label>Nombre:</label><br>
                    <input id="campoPanelActualizar2" type="text" name="nombre" placeholder="Escribe Aqui">
                    <br>
                    <label>Apellido:</label><br>
                    <input id="campoPanelActualizar3" type="text" name="apellido" placeholder="Escribe Aqui">
                    <br>
                    <label>Cantidad Inicial:</label><br>
                    <input id="campoPanelActualizar4" type="number" min="1" name="cantidad" placeholder="Escribe Aqui">
                    <br>
                    <input id="boton_actualizar_empleado" type="submit" value="Finalizar">
                  </form>
                </div>
              </div>
            </div>
        </div>
        
        <div class="row col-lg-4">
          <h1 id="ventas">Ventas del dia de hoy</h1>
          <table>
            <tr>
              <th>id</th>
              <th>Empleado</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Acumulado</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div> 
      </div>
    </div>

  </div>
  <script src="java/empleados.js"></script>
</body>
</html>