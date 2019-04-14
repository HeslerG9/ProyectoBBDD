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
        
		<div class="col-md-12 order-md-1">
    <h4 class="mb-3">Datos</h4>
    <form class="needs-validation" id="formulario-pasajero" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="primer-nombre">Primer Nombre:</label>
                <input type="text" class="form-control" name="primer-nombre" id="primer-nombre"  placeholder="" value="" required>
                <div class="invalid-feedback">
                    Se requiere un primer nombre válido.
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
	</section>

	
    <!--====== Scripts -->
    <script src="../landingpage/registro/js/pasajero.js"></script>
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