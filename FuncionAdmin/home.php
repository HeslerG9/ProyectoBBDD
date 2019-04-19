<?php
    session_start();
    if ($_SESSION['lvl']==2){
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../landingpage/css/main.css">

	<link href="../landingpage/img/air/logoaerolinea.jpg" rel="icon">
	<script src="../landingpage/js/jquery.min.js"></script>
</head>
<body>
<!-- 	<?php
    include("sidebar.html")
    ?> -->
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li class="pull-center">
					<h4>Buscar</h4>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<!--<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>-->
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
				<div class="page-header">
				<h1 >Bienvenido Administrador </h1>
				</div>
			</div>
		
			<br>
			 <center><p>¡Planifica y Registra las diferentes actividades de la empresa <br> asi como los vuelos , nuevas rutas o simplemnete agregar personal </p></center> 
			 


			  <div >
			  <center><img src="../landingpage/img/Air/fondoAdmin.jpg" id="foto"  style="width:60%;"alt="" ></center>

			  </div>
			  
			<!--<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Representative
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-female"></i>
				</div>
				<div class="full-box tile-number text-titles">
					<p class="full-box">70</p>
					<small>Register</small>
				</div>
			</article>-->
		</div>
		<!--<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">System <small>TimeLine</small></h1>
			</div>
			


		</div>
	</section>

	<! Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notificaciones <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    
				
			  	</div>
			  
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Titulo</h4>
				      	<p class="list-group-item-text">cambio de clave</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Pagos</h4>
				      	<p class="list-group-item-text">Pago pendiete</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!--====== Scripts -->
	<script src="js/registrosAdmin.js"></script>
	<script src="../landingpage/js/jquery-3.1.1.min.js"></script>
	<script src="../landingpage/js/sweetalert2.min.js"></script>
	<script src="../landingpage/js/bootstrap.min.js"></script>
	<script src="../landingpage/js/material.min.js"></script>
	<script src="../landingpage/js/ripples.min.js"></script>
	<script src="../landingpage/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../landingpage/js/main.js"></script>
	<!--<script src="../js/ruta-segura-user.js"></script>-->
	
	<script>
		$.material.init();
	</script>
</body>
</html>
<?php
}
else{
    header ('location: ../Landingpage');
}
?>