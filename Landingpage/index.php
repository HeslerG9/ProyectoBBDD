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
          <li><a href="vuelos.php">Vuelos</a></li>
          <li><a href="#about">Avisos</a></li>
          <li><a href="registropasajero.php">Registro</a></li>
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
      <h1>Bienvenidos</h1>
      <h2>Siente el verdadero placer de volar     ! Viaja con nosotros ! </h2>
      <a href="#about" class="btn-get-started">Landing page</a>
    </div>
  </section><!-- #hero -->

  <main id="main">
 

 <!--==========================
      INICIO Prueba
    ============================-->
    <br>
    <section id="about">
      <div class="container">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Bienvenidos viajeros</h2>
            <p>
              A BORDO
            </p>

             <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-book"></i></div>
              <h4 class="title"><a href="">PUNTUALIDAD</a></h4>
              <p class="description">
                Viaja con la mejor empresa de vuelo 100% catracha , disfruta el <br>
                placer de volar con nosotros ,rapido , comodo y eficiente.. </p>
            </div>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-desktop"></i></div>
              <h4 class="title"><a href="">SEGURIDAD</a></h4>
              <p class="description">Viaja seguro con nosottros la mejor aerolinea catracha <br>
                y proximamente en desarrollo para ser de las mejores del mundo </p>
            </div>

             <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-plane"></i></div>
              <h4 class="title"><a href="">CHARTERS</a></h4>
              <p class="description">Si lo que quieres es comodidad contamos <br>
                con vuelos charters a tu disponibilidad </p>
            </div>

          </div>

          <div class="col-md-6">
						<div class="about-img">
							<img src="./img/air/imagenprueba.png" alt="" width=100% id="mapa">
							<br>
							<h4 style="text-align:center;text-decoration-line: underline">Disfruta tu viaje</h4>
						</div>
					</div>

         
        </div>

      </div>
    </section><!-- #about -->
    <!--==========================
      FIN Prueba
    ============================-->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Ciudades importantes</h2>
            <p>
              En esta sección se muestran una serie de ciudades a donde viajamos
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-star-o"></i></div>
              <h4 class="title"><a href="">Rio de Janeiro</a></h4>
              <p class="description">Es uno de los principales centros económicos, de recursos culturales y financieros del Brasil. Es conocida internacionalmente por sus iconos culturales y paisajes, como el Pan de Azúcar, la estatua del Cristo Redentor (una de las siete maravillas del mundo moderno)</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-telegram"></i></div>
              <h4 class="title"><a href="">Hong kong</a></h4>
              <p class="description"> Su vibrante centro urbano densamente poblado es un importante puerto y centro financiero global con un horizonte lleno de rascacielos</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-plane"></i></div>
              <h4 class="title"><a href="">Milan</a></h4>
              <p class="description">Milán, una metrópolis en la región norte de Lombardía de Italia, es una capital mundial de la moda y el diseño. Hogar de la bolsa de valores nacional, es un centro financiero también conocido por sus restaurantes y tiendas de alto nivel.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                      <div class="carousel-item active" style="background-image: url(img/air/brasil.jpg);background-repeat: no-repeat;background-size: cover;  background-position: center center; height: 80vh;">
                      </div>
                      <div class="carousel-item"  style="background-image: url(img/air/china.jpg);background-repeat: no-repeat;background-size: cover;  background-position: center center; height: 80vh;">
                      </div>
                      <div class="carousel-item"  style="background-image: url(img/air/italia.jpg);background-repeat: no-repeat;background-size: cover;  background-position: center center; height: 80vh;">
                      </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
          </div>
        </div>

    

      <!-- row -->
      <div class="row">
        <div class="section-header ">
         <h1> <b> Nuestra Flotilla de Aviones</b>  </h1>
          <p class="lead" >   Abriendo nuevas rutas para conectarse.</p>
        </div>
      </div>
      <!-- /row -->

      <!-- courses -->
      <div id="courses-wrapper">

        <!-- row -->
        <div class="row">

          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img style="height:140px;width: 250px;"  src="./img/Aviones/Boeing 777-3000.png" alt="" >
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Boeing 777-3000</a>
              <div class="course-details">
                <span class="course-category">BOEING</span>
                
              </div>
            </div>
          </div>

          <!-- /single course -->

          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img src="./img/Aviones/Embraer 190.jpg" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Embraer 190 </a>
              <div class="course-details">
                <span class="course-category">Embraer  </span>
                
              </div>
            </div>
          </div>
          <!-- /single course -->

          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img style="height:140px;width: 250px;" src="./img/Aviones/SuperJet 100.png" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Super jet 100</a>
              <div class="course-details">
                <span class="course-category">Super jet</span>
              </div>
            </div>
          </div>
          <!-- /single course -->

          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img src="./img/Aviones/Airbus 319.jpg" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Airbus 319</a>
              <div class="course-details">
                <span class="course-category">Airbus</span>
                
              </div>
            </div>
          </div>
          <!-- /single course -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">

          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img style="height:140px;"src="./img/Aviones/Airbus 320 neo.jpg" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Airbus 320 neo</a>
              <div class="course-details">
                <span class="course-category">Airbus</span>
              
              </div>
            </div>
          </div>
          <!-- /single course -->

          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img src="./img/Aviones/Airbus A321.jpg" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Airbus A321</a>
              <div class="course-details">
                <span class="course-category">Airbus</span>
                
              </div>
            </div>
          </div>
          <!-- /single course -->

          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img style="height:140px;width: 250px;" src="./img/Aviones/Airbus A330.png" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Airbus A330</a>
              <div class="course-details">
                <span class="course-category">Airbus</span>
                
              </div>
            </div>
          </div>
          <!-- /single course -->


          <!-- single course -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="course">
              <a href="#" class="course-img">
                <img src="./img/Aviones/Airbus A340-600.jpg" alt="">
                <i class="course-link-icon fa fa-link"></i>
              </a>
              <a class="course-title" href="#">Airbus A340-600</a>
              <div class="course-details">
                <span class="course-category">Airbus</span> 
                
              </div>
            </div>
          </div>
          <br>
          <!-- /single course -->

        </div>
        <!-- /row -->

      </div>
      <!-- /courses -->

      

    </div>
    <!-- container -->

  </div>
  <!-- /Courses -->



  
   
    

    <!--==========================
    Call To Action Section
    ============================-->

    

    
          <!--

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Enviar Mensage</button></div>
              </form>
            </div>
          </div>
        -->

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
}//si no hay sesión
else {
    if ($_SESSION['lvl']==1) {
        header('location: ../FuncionPasajero');
    } else {
        if ($_SESSION['lvl']==2) {
            header('location: ../FuncionAdmin/home.php');
        }
    }
}