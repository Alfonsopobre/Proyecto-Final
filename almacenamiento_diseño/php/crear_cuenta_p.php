<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $cedula = $_POST['N_cedula'];
  $fecha = $_POST['fecha'];
  $correo = $_POST['correo'];
  $contra = $_POST['contraseña'];
  $rol = $_POST['roles'];
  
  if (!empty($nombre) and !empty($apellido) and !empty($cedula) and !empty($fecha) and !empty($correo) and !empty($contra) and !empty($rol)){

    $sql0 = "SELECT * FROM usuarios WHERE cedula = $cedula";
    $resultado = $conexion->query($sql0);

    if ($resultado->num_rows > 0){
      echo "<div class='alert alert-info' id='campos_vacios'>Este usuario ya existe</div>";
    }
    else{
      $sql = "INSERT INTO usuarios(nombre, apellido, cedula, fecha_naci, correo, contrasena, rol, activo) VALUES ('$nombre', '$apellido', '$cedula', '$fecha', '$correo', '$contra', '$rol', 1)";
  
      if ($conexion->query($sql) === TRUE){
          echo "<div class='alert alert-info' id='campos_vacios'>Se ha agregado satisfactoriamente</div>";
      }
      else{
          echo "<div class='alert alert-info' id='campos_vacios'>Error en el registro de datos</div>";
      }
    }
  }
  else{
    echo "<div class='alert alert-info' id='campos_vacios'>Campos vacios</div>";
  }
}
?>