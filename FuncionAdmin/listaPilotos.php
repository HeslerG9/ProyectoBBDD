<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sistema de matrícula</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../landingpage/css/main.css">
    <link rel="stylesheet" type="text/css" href="../Landingpage/css/bootstrap1.css" />

    <link href="../landingpage/img/unah10.png" rel="icon">
    <script src="../landingpage/js/jquery.min.js"></script>
</head>
<body>
	<?php
    include("sidebar.html")
    ?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">2</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container">
            <div class="page-header">
            <h1 class="all-tittles">Listas de Registro <small>Lista de Pilotos Registrados</small></h1>
            </div>
        </div>
        
		<div class="container">
        <div class="row my-1">
        <div class="container-fluid ">

<div>
    <table class="table table-striped table-responsive-lg" >
        <thead>
            <tr>
                <th>Id Piloto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electronico</th>
                <th>Numero de Identidad</th>
                <th>Pais de origen</th>
                <th>Fecha de Ingreso</th>
                <th>Horas de vuelo</th>
            </tr>
        </thead>
        <tbody id="tabla_piloto">

        </tbody>
    </table>

   
</div>
</div>


</div>

	</section>

	
    <!--====== Scripts -->
    <script src="js/controlador.js"></script>
	<script src="../landingpage/js/jquery-3.1.1.min.js"></script>
	<script src="../landingpage/js/sweetalert2.min.js"></script>
	<script src="../landingpage/js/bootstrap.min.js"></script>
	<script src="../landingpage/js/material.min.js"></script>
	<script src="../landingpage/js/ripples.min.js"></script>
	<script src="../landingpage/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../landingpage/js/main.js"></script>
	<!-- <script>
		$.material.init();
	</script> -->
</body>
</html>