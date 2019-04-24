<?php
    session_start();
    if ($_SESSION['lvl']==1){
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Boletos Comprados</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/unah10.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

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
                <h1><a href="#hero"><img src="img/air/logoarolinea.jpg" width="15" height="25" alt="" title="" /></img>
                        Copán Airlines</a></h1>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="#hero">Regna</a></h1>-->
            </div>

            <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="vuelos.php">Vuelos</a></li>
          <li class="menu-active"><a href="boletos_pasajero.php">Boletos comprados</a></li>
        <!--   <li><a href="CompraBoleto.php">Comprar Boletos</a></li> -->
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
            <h1>Bienvenidos Pasajero</h1>
            <h2>Siente el verdadero placer de volar ! Viaja con nosotros ! </h2>
            <a href="#about" class="btn-get-started">Ver el Listado de todos los boletos comprados</a>
        </div>
    </section><!-- #hero -->


    <!--==========================
      INICIO Prueba
    ============================-->

    <section id="about">

        <div class="container" id="contenido-pagina">
            <span class="d-none" id="idpasajero"><?php echo $_SESSION['idpasajero'] ?></span>

            <div class="container-fluid border my-5" style="padding: 5px;">
                <h3 style="color: rgb(131, 2, 2);">Boletos comprados</h3>
                
                    <div class="container-fluid forma03-tabla">

                        <div>
                            <table class="table table-striped table-responsive-lg" id="tabla_info_boleto">
                                <thead>
                                    <tr>
                                        <th>Fecha de Emisión</th>
                                        <th>Total Compra</th>
                                        <th>Pais Origen</th>
                                        <th>Pais Destino</th>
                                        <th>Fecha Hora de salida</th>
                                        <th>Fecha Hora de llegada</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_boleto">

                                </tbody>
                            </table>

                            <h2 class="d-none text-danger" id="mensaje-no-registro">No ha comprado ningún boleto todavía.</h2>
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
    <script src="js/pasajero_login.js"></script>
    <!-- <script src="registro/js/pasajero.js"></script>
    <script src="registro/js/vuelo.js"></script> --> -->
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
        $(document).ready(function () {
            $("#op1").attr("class", "nav-link active");
        });
    </script>

    <script src="js/boletos_pasajero.js"></script>

</body>

</html>
<?php
}
else{
    header ('location: ../Landingpage');
}
?>