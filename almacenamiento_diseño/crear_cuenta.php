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
  <link rel="stylesheet" href="estilos/estilo_crearcuenta.css">
  <style>
    select{
    background-color:#0059ce;
    border: 2px solid #0d06e4;
    color:white;
    border-radius: 15px;
    text-align: center;
    height: 35px;
    width: 200px;
    outline: none;
    position: relative;
    }
  </style>
</head>

<body>
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <h1>Crear cuenta</h1>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                  <?php
                  include "php/conexion.php";
                  include "php/crear_cuenta_p.php";
                  ?>
                  <label for="nombre"><h3>Nombre:</h3></label>
                  <input type="text" name="nombre" placeholder="Escribe Aqui">
                  <br>
                  <label for="apellido"><h3>Apellido:</h3></label>
                  <input type="text" name="apellido" placeholder="Escribe Aqui">
                  <br>
                  <label for="N°_de_cedula"><h3>N° de Cedula:</h3></label>
                  <input type="number" min="1" name="N_cedula" placeholder="Escribe Aqui">
                  <br>
                  <label for="fecha"><h3>Fecha de nacimiento:</h3></label>
                  <input type="date" name="fecha" >
                  <br>
                  <label for="correo"><h3>Correo:</h3></label>
                  <input type="text" name="correo" placeholder="Escribe Aqui">
                  <br>
                  <label for="contraseña"><h3>Contraseña:</h3></label>
                  <input type="text" name="contraseña" placeholder="Escribe Aqui">
                  <br>
                  <label for="roles"><h3>Rol:</h3></label>
                  <select class="roles" name="roles">
                    <?php

                    $sql = "SELECT * FROM rol";
                    $resultado = $conexion->query($sql);

                    while ($row = $resultado->fetch_assoc()){
                      echo "<option value='" . $row["idrol"] . "'>" . $row["nombre"] . "</option>";
                    }
                    ?>
                  </select>
                  <br>
                  <input type="submit" value="Continuar">
                </form>
              <br>
              <form action="inicio_sesion.php" method="post">
                <input type="submit" value="Regresar">
              </form>
            </div>
        </div>
    </div>
</body>
</html>