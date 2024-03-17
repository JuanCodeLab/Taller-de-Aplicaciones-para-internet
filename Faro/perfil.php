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
      .contenedor {
        background-image: url(img/diario6.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
      }
      .card {
      background-color: #fffa;
    }
    </style>
    <body>
<?php

    session_start();
    if(!isset($_SESSION['Usuario'])){
        echo '<script>
              alert("Usted no puede acceder a esta zona sin antes iniciar sesion.");
              window.location = "http://localhost/Faro/subnueva.html";
              </script>';
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
                            echo '<li class="nav-item"><a class="nav-link active" href="perfil.php">Perfil</a></li>';
                          }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="noticias.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Noticias
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="noticias.php">Hoy</a></li>
                            <li><a class="dropdown-item" href="noticias.php">Nacional</a></li>
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
        <div class="contenedor">
        
        <div class="container px-4 px-lg-5">
        
            <div class="row gx-4 gx-lg-5 align-items-center my-5">

              <div class="col-lg-3"></div>
              
                <div class="col-lg-5"><br><br>
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Datos de Usuario</h2>
                            <table class="table">
                                
                            <?php
                                $Correo = $_SESSION['Usuario'];
                                $sql = "SELECT * FROM usuarios WHERE Correo='$Correo'";
                                $resultado = mysqli_query($conexion, $sql);
                                while($mostrar = mysqli_fetch_array($resultado)){?>
                                
                                <tr>
                                  <td><?php echo $mostrar['Nombre']?>
                                  <?php echo $mostrar['Apellido']?>
                                  </td>
                                </tr>
                                <tr>
                                  <td><?php echo $mostrar['Correo']?></td>
                                </tr>
                                </table>
                                <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>         
            </div>
            
            <!--div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Tarjeta de ejemplo</p></div>
            </div-->
            

            <div class="row gx-4 gx-lg-5">
              
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia 4</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Leer más</a></div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia 5</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Leer más</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia 6</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Leer más</a></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            
          
          
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
