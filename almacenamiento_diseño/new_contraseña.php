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
    <link rel="stylesheet" href="estilos/estilo_newcontraseña.css">
</head>
<body>
    <?php
    $cedula = $_GET['cedula'];
    ?>
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <h2>Crear nueva contraseña</h2>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <?php
                    include "php/contraseñas.php";
                    ?>
                    <label for="crear_contraseña"><h3>Crear nueva contraseña</h3></label>
                    <input type="password" id="crear_contraseña" name="password1" placeholder="Escribe Aqui">
                    <br>
                    <label for="confirmar_contraseña"><h3>Confirmar contraseña</h3></label>
                    <input type="password" id="confirmar_contraseña" name="password2" placeholder="Escribe Aqui">
                    <br>
                    <input type="submit" name="boton" value="Confirmar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>