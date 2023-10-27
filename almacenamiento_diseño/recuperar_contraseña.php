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
    <link rel="stylesheet" href="estilos/estilo_recuperarcontraseña.css">
</head>
<body>
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <h2>Recuperar contraseña</h2>
            </div>
            <div class="panel-body">
                <p>Llena los siguientes campos de texto con la informacion correspondiente para continuar con el proceso de recuperacion de contraseña</p>
                <form action="" method="POST">
                    <?php
                    include "php/conexion.php";
                    include "php/recuperar_cuenta.php";
                    ?>
                    <br>
                    <label for="fecha_naci"><h3>Fecha de Nacimiento:</h3></label>
                    <input id="fecha_naci" type="date" name="fecha_naci" placeholder="Escribe Aqui" >
                    <br>
                    <label for="numero_iden"><h3>Numero de Identificacion:</h3></label>
                    <input id="numero_iden" type="text" name="numero_iden" placeholder="Escribe Aqui" >
                    <br>
                    <input id="boton_confirmar" name="boton_confirmar" type="submit" value="Confirmar">
                </form>
                <form action="inicio_sesion.php">
                    <input type="submit" value="Regresar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>