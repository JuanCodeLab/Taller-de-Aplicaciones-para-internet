<?php
  include 'php/conexion.php';                       
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>El Faro</title>

        <link rel="icon" type="image/x-icon" href="img/faro.png" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <style>
      .card {
      background-color: #fffa;
    }
    </style>
    <body>
<?php

    session_start();
    if(!isset($_SESSION['Usuario'])){
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Santos guacamoles!</strong> Deberias ser socio ahora y obtener todos los beneficios unicos!
            Para mas informacion <a href="subnueva.html" class="alert-link">haz click aqui</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">

                <a class="navbar-brand" href="index.php"><img src="img/faro.png" width="40" height="40" />El Faro</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                  <div class="d-grid gap-2 d-md-block">
                    <a class="nav-link active" href="subnueva.html"><button class="btn btn-outline-info btn-sm" type="button">Ser socio</button></a>                    
                    <a class="nav-link active" href="sesion.html"><button class="btn btn-outline-secondary btn-sm" type="button">Iniciar sesion</button></a>  
                  </div>';
                  session_destroy(); 
         
                } else {
                  echo '
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container px-5">
            
                            <a class="navbar-brand" href="index.php"><img src="img/faro.png" width="40" height="40" />El Faro</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                      
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="d-grid gap-2 d-md-block">
                            <a class="nav-link active" href="perfil.php"><img src="img/perfil.png" alt="Perfil" height="40" width="40"/></a>';   
?>
<?php
              $Correo = $_SESSION['Usuario'];
              $sql = "SELECT * FROM usuarios WHERE Correo='$Correo'";
              $resultado = mysqli_query($conexion, $sql);
              while($mostrar = mysqli_fetch_array($resultado)){
?><a class="nav-link active" href="perfil.php"><p class="text-bg-dark">
<?php echo $mostrar['Nombre'] ?>
&nbsp;
<?php echo $mostrar['Apellido']?>
</p></a>     
<?php } ?>
<?php
                    echo  '<a class="nav-link active" href="php/cerrar_sesion.php"><button class="btn btn-outline-secondary btn-sm" type="button">Cerrar sesion</button></a>
                              </div>';
                }
            ?>
   <object class="file-person-fill"> </object>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                          if(isset($_SESSION['Usuario'])){
                            echo '<li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>';
                          }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item dropdown">
                          <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Noticias
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#novedades">Hoy</a></li>
                            <li><a class="dropdown-item" href="#santonio">Nacional</a></li>
                            <li><a class="dropdown-item" href="index.php">Internacional</a></li>
                          </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Deportes
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php">Futbol</a></li>
                            <li><a class="dropdown-item" href="index.php">Tenis</a></li>
                            <li><a class="dropdown-item" href="index.php">Otros</a></li>
                          </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Tecnologia</a></li>
                        <li class="nav-item"><a class="nav-link" href="sobre.html">Sobre El Faro</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="container px-4 px-lg-4 align-items-center" id="novedades">
          <div class="row gx-6 gx-lg-5 align-items-center my-5">
            <p class="fst-italic">Importante</p>
              <h1 class="font-weight-light">Novedades</h1>
            <div class="col-lg-10"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/usuarios.jpg" alt="..." /></div>
              <div class="col-lg-10">
                  <p>En base a la solicitud del cliente, se ha ingresado informacion a una tabla 
                    en la cual se pueden obtener los datos del usuario que a ingresado a la sesion, 
                    esto en base a la informacion solicitada por el cliente en las orientaciones del
                    proyecto.
                  <br><br>
                  Se a dado un enfasis grafico a la pagina de subscripcion, cambiandola por una totalmente nueva,
                   ademas se han ingresados logos como paginas de retorno para cada anexo de inicio y registro
                   de sesion.
                  </p>
              </div>
          </div>
        </div>
        <br><br>
        <div class="container px-4 px-lg-4 align-items-center" id="santonio">
          <div class="row gx-6 gx-lg-5 align-items-center my-5">
            <p class="fst-italic">Nacional</p>
              <h1 class="font-weight-light">Aumenta porcentaje de robos en San Antonio</h1>
            <div class="col-lg-10"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/santonio.jpg" alt="..." /></div>
              <div class="col-lg-10">
              
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  <br><br>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
              </div>
              
          </div>
        </div>
        <br><br>
        <div class="container px-4 px-lg-4 align-items-center" id="robotica">
          <div class="row gx-6 gx-lg-5 align-items-center my-5">
          <p class="fst-italic">Nacional</p>
          <h1 class="font-weight-light">Noticia Principal</h1>
            <div class="col-lg-10"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/robots.jpg" alt="..." /></div>
              <div class="col-lg-10">
              
                
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  <br><br>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
              </div>
          </div>
        </div>
        <br><br>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    <footer class="px-5 bg-dark">
            <div  class="py-5 my-5"></div>

            <div  class="row row-cols-md-5 row-cols-1 row-cols-sm-2 py-5 my-25 ">

            <div class="col mb-3">
              <img src="img/faro.png" width="40" height="40" />
              <p class="text-bg-dark">El Faro</p>
              <p class="text-bg-dark">© 2023</p>
            </div>

            <div class="col mb-3">
              
            </div>

            <div class="col mb-3">
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Inicio</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Noticias</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Hoy</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Nacional</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Internacional</a></li>
              </ul>
            </div>

            <div class="col mb-3">
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Deportes</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Futbol</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Tenis</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Otros</a></li>
              </ul>
            </div>
            <div class="col mb-3">
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Tecnologia</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-bg-dark">Sobre el Faro</a></li>
              </ul>
            </div>
            <div  class="py-3 my-2"></div>
          </div> 
    </footer>
</html>
