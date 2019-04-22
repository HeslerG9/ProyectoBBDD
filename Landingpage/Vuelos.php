<?php
session_start();
//si hay una sesión
if (!isset($_SESSION['name'])) {
    //se muestra el contenido de la página web
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
  <link rel="stylesheet" type="text/css" href="css/bootstrap1.css" />
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
          <li><a href="index.php">Inicio</a></li>
          <li class="menu-active"><a href="vuelos.php">Vuelos</a></li>
          <li><a href="RegistroPasajero.php">Registro</a></li>
          <!--<li><a data-toggle="modal" data-target="#exampleModal">Registrate</a></li>-->
         
          <li class="menu-has-children"><a href="#">Iniciar Sesión</a>
            <ul>
              <li><a href="loginpasajero.html">Pasajero</a></li>
              <li><a href="loginadmin.html">Administrador</a></li>
            </ul>
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
      <h1>Bienvenidos Pasajero</h1>
      <h2>Siente el verdadero placer de volar     ! Viaja con nosotros ! </h2>
      <a href="#about" class="btn-get-started">Ver todos los vuelos aqui</a>
    </div>
  </section><!-- #hero -->
 

 <!--==========================
      INICIO Prueba
    ============================-->
    
    <section id="about">  

    <div class="container" id="contenido-pagina">
        <!-- Matrícula/////////////////// -->
        <!-- adicionar////// -->
        <div class="container-fluid border my-5" style="padding: 5px;">
            <h3 style="color: rgb(131, 2, 2);">Vuelos</h3>
            <div class="row">
                <div class="col-12">
                    <p>Encuentra tu vuelo</p>
                </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="sel2" class="encabezado-tabla my-2">Pais Destino:</label>
                        <select class="form-control" name="pais-destino" id="seleccion-pais-destino" required>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="sel1" class="encabezado-tabla my-2">Pais Origen:</label>
                        <select class="form-control" name="pais-origen" id="seleccion-pais-origen" required>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" id="boton-matricular" class="btn btn-danger" style="margin-bottom: 1em;">Buscar vuelo</button>
                </div>
            </div>
        </div>


        <!-- Asignaturas añadidas -->
        <div class="container-fluid forma03-tabla">
            <div class="text-center">
                <div class=" encabezado">
                    Listado de vuelos
                </div>
            </div>

            <div>
                <table class="table table-striped table-responsive-lg">
                    <thead>
                        <tr>
                        <th>Id vuelo</th>
                            <th>Cantidad Escalas</th>
                            <th>Fecha y hora de salida</th>
                            <th>Fecha y hora de llegada</th>
                            <th>Pais de salida</th>
                            <th>Tipo de clase</th>
                            <th>Precio del vuelo</th>
                            
                            <!-- <th>Semana</th> -->
                        </tr>
                    </thead>
                    <tbody id="tabla_vuelo">
                                          
                    </tbody>
                </table>
            </div>
        </div>


    </div>
            

      
    </section><!-- #contact -->

  </main>


       

<br>
            
        </div>
        <!-- /footer nav -->
        <footer id="footer" class="section">
            <?php 
            include ("footer.html")
            ?>
            </footer>
 
  <!-- #footer -->
  
   <script src="js/jquery-3.3.1.js"></script>
   
    <script src="registro/js/pasajero.js"></script>
    <script src="registro/js/vuelo.js"></script>
    <!-- <script src="registro/js/Administrar.js"></script> -->
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
  <script>
        $(document).ready(function() {
            $("#op1").attr("class", "nav-link active");
        });
    </script>
</body>
</html>
<?php
}//si no hay sesión
else {
    if ($_SESSION['lvl']==1) {
        header('location: ../FuncionPasajero');
    } else {
        if ($_SESSION['lvl']==2) {
            header('location: ../FuncionAdmin');
        }
    }
}