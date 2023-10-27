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
    <link rel="stylesheet" href="estilos/estilo_iniciosesion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <nav id="navbar" class="navbar">
            <ul  class="nav navbar-nav navbar-center">
                <li><a href="inicio.html" class="ov-btn-grow-ellipse">Inicio</a></li>
                <li><a href="acerca_de_nosotros.html" class="ov-btn-grow-ellipse">Acerca de nosotros</a></li>
                <li><a href="servicios.html" class="ov-btn-grow-ellipse">Servicios</a></li>
                <li><a class="active" href="inicio_sesion.php" class="ov-btn-grow-ellipse">Inicio de sesion</a></li>
            </ul>
        </nav>
   </div>
   <div class="container container-row"> 
    <div class="row col-lg-8">
        <div id="empresa">
            <h1>Granja Ecoturistica La Joya</h1>
        </div>
    </div>
    <div class="row col-lg-4">
        <div align="center" class="fond">
          <div id="logo" class="carreaux_presentation_light" style="background-image:url(imagenes/Logo.jpeg);">
            <div class="shadow_swhow_mini">
                <div class="deroul_titre">Disfruta aquí</div>
                <div class="deroul_soustitre">!Que refrescante¡</div>
            </div>
          </div> 
        </div>       
    </div>
   </div>
   <div class="container">
     <div class="panel">
      <div class="panel-header">
          <h2>Inicio de Sesion</h2>
      </div>
      <div class="panel-body">
          <form action="" method="POST">
                <?php
                    include "php/conexion.php";
                    include "php/login.php";
                ?>
              <input type="checkbox" id="btn-modal">
              <label title="Ayuda" for="btn-modal" class="lbl-modal">?</label>
              <div class="modal">
                  <div class="contenedor">
                      <header>¡Bienvenidos!</header>
                      <label for="btn-modal"><img src="imagenes/error.png"></label>
                      <div class="contenido">
                          <h2 id="emergente">¿Necesitas ayuda?</h2>
                          <p>Si ya tienes cuenta, solamente ingresa los datos necesarios para el inicio de sesion que son correo y contraseña. <br>
                          Si no tienes cuenta puedes crearla oprimiendo el boton crear cuenta.</p>
                      </div>
                  </div>
              </div>
              <label for="correo"><h3>Correo:</h3></label>
              <input type="text" name="correo" placeholder="Escribe Aqui" >
              <br>
              <div class="wrapp-input">
                  <label id="contra" for="pass"><h3>Contraseña:</h3></label>
                  <span class="icon-eye">
                    <i class="fa-solid fa-eye-slash"></i>
                  </span>
                 <input type="password" name="contra" id="pass" placeholder="Escribe Aqui">
                 <br>
                </div>
              <input type="submit" name="ingresar" value="Continuar">
          </form>
          <div class="btn_recuperar_contraseña">
            <form action="recuperar_contraseña.php" method="post">
                <input type="submit" value="¿Olvide mi contraseña?">
            </form>
            <form action="crear_cuenta.php">
                <input type="submit" value="Crear cuenta">
            </form>
        </div>
      </div>
     </div>
   </div>
   <footer>
        <div class="container-row container-fluid">
            <div class="row col-lg-8">
                <h2 id="contactanos">Contactanos</h2>
                <h3 id="infor">Tel:3124539987       Correo:marlonalonsop@gmail.com       </h3>
            </div>
            <div class="row col-lg-4">
                <h3 id="reds">Redes Sociales</h3>
                <img id="foot1" title="Facebook" src="imagenes/face.jpg" >
                <img id="foot2" title="Instagram" src="imagenes/instagram.png" >
                <img id="foot3" title="Twitter" src="imagenes/twitter.jpg" >
            </div>
        </div>    
   </footer>
   <script src="java/inicio_sesion.js"></script>
</body>
</html>