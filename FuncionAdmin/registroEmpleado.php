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
              <h1 class="all-tittles">Sistema de registro <small> Registrar empleado</small></h1>
            </div>
        </div>
       <div class="container">
        <div class="row my-1">
            <?php
                include("registro/formularios/formulario-empleado.html");
			?>
	
        </div>
	
	</section>

	
    <!--====== Scripts -->
	<script src="registro/js/empleado.js"></script>
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
	<script>
        $(document).ready(function() {
            $("#op1").attr("class", "nav-link active");
        });
    </script>
</body>
</html>