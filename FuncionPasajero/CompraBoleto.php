<?php
    session_start();
    if ($_SESSION['lvl']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Página Aerolinea</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/unah10.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#hero"><img src="img/air/logoarolinea.jpg" width="15" height="25" alt="" title="" /></img>  Copán Airlines</a></h1>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Inicio</a></li>
          <li><a href="#bien">Vuelos</a></li>
          <li><a href="#about">Avisos</a></li>
          <li><a href="#">Comprar Boletos</a></li>
          <!--<li><a data-toggle="modal" data-target="#exampleModal">Registrate</a></li>-->
         
          <li class="dropdown" style="margin-left:10; ">
                            <button type="button" class="btn dropdown-toggle perfil" data-toggle="dropdown" style="box-shadow:none;"
                                    width="50px">
                                <span style="color: white;background: #6c6666; class="usu"><?php echo($_SESSION['name'])?><!-- Aqui va con php el nombre obtenido de la session --></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <input id="cerrar_sesion" type="button" value="Cerrar-Sesion">
                            </div>
                        </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Bienvenidos <?php echo($_SESSION['name'])?></h1>
      <h2>Siente el verdadero placer de volar     ! Viaja con nosotros ! </h2>
      <a href="#about" class="btn-get-started">Comprar boletos</a>
    </div>
  </section><!-- #hero -->
  <section id="about">
  <div class="container">
        <div class="row my-1">
 
  <div class="col-md-12 order-md-1">
    <h4 class="mb-3">Datos</h4>
    <form class="needs-validation" id="formulario-pasajero" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="primer-nombre">  El codigo de vuelo que quiere comprar:</label>
                <input type="text" class="form-control" name="primer-nombre" id="primer-nombre"  placeholder="" value="" required>
                <div class="invalid-feedback">
                    El codigo de vuelo que quiere comprar
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="segundo-nombre">Segundo Nombre:</label>
                <input type="text" class="form-control" name="segundo-nombre" id="segundo-nombre" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Se requiere un segundo nombre válido.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="primer-apellido">Primer Apellido:</label>
                <input type="text" class="form-control" name="primer-apellido" id="primer-apellido" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Se requiere un primer apellido válido.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="segundo-apellido">Segundo Apellido:</label>
                <input type="text" class="form-control" name="segundo-apellido" id="segundo-apellido"placeholder="" value="" required>
                <div class="invalid-feedback">
                    Se requiere un segundo apellido válido.
                </div>
            </div>
        </div>

        <!-- <div class="mb-3">
            <label for="fecha-nacimiento">Fecha de nacimiento:</label>
            <div class="input-group">
                <input type="date" class="form-control" name="fecha-nacimiento" id="fecha-nacimiento"  placeholder="numero de cuenta" required>
                <div class="invalid-feedback" style="width: 100%;">
                    Se requiere una fecha de nacimiento válido.
                </div>
            </div>
        </div> -->

        <div class="mb-3">
            <label for="direccion">Dirección:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="direccion" required>
                <div class="invalid-feedback" style="width: 100%;">
                    Se requiere una dirección válida.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="contraseña">Contraseña:</label>
            <div class="input-group">
                <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="contraseña" required>
                <div class="invalid-feedback" style="width: 100%;">
                    Se requiere una contraseña.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="pais">pais:</label>
            <div class="input-group">
                <select class="form-control" name="pais" id="seleccion-pais" required>
                    <option value=""></option>
                </select>
                <div class="invalid-feedback" style="width: 100%;">
                    Se requiere una pais válida.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="numero-identidad">Numero de Identidad:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="numero-identidad"  id="numero-identidad"placeholder="numero Identidad" required>
                <div class="invalid-feedback" style="width: 100%;">
                    Se requiere un numero de identidad válido.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="numero-telefono">Numero de Teléfono:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="numero-telefono"  id="numero-telefono"placeholder="numero telefono">
                <div class="invalid-feedback" style="width: 100%;">
                    Se requiere un numero de telefono válido.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Correo Electronico:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
                Please enter a valid email address.
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" id="registrar">Registrar</button>
    </form>
</div>
</div>
</div>
        <!-- /footer nav -->
        <footer id="footer" class="section">
            <?php 
            include ("footer.html")
            ?>
            </footer>
 
  <!-- #footer -->
  <script src="js/jquery-3.3.1.js"></script> 
  <script src="js/pasajero_login.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3J_fdF2C2RpQm3796zlNBgvhfqpJMrQ8"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
<?php
}
else{
    header ('location: ../Landingpage');
}
?>