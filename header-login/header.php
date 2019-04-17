<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="../Landingpage/css/bootstrap1.css" />

</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
        
                        <img src="img/logo-unah.png" alt="la imagen se mamo" width="110" height="60">
        
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto" id="enlaces-menu">
                            <li class="nav-item"><a class="nav-link" href="#">Matricula</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Historial Academico</a></li>
                        </ul>
        
        
                        <div class="dropdown" style="margin-left:0; ">
                            <button type="button" class="btn dropdown-toggle perfil" data-toggle="dropdown" style="box-shadow:none;">
                                <img src="img/perfil-numerocuenta.jpg" class="rounded-circle foto-perfil "
                                    width="50px" alt="Cinque Terre">
                                <span class="usu">Usuario Prueba<!-- Aqui va con php el nombre obtenido de la session --></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">salir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    
        <script src="../landingpage/js/jquery-3.3.1.js"></script>
        <script src="../landingpage/js/popper.min.js"></script>
        <script src="../landingpage/js/bootstrap1.min.js"></script>
</body>
</html>