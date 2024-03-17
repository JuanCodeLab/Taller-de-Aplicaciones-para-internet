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

                <a class="navbar-brand" href="#"><img src="img/faro.png" width="40" height="40" />El Faro</a>
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
                        <li class="nav-item"><a class="nav-link active" href="#!">Inicio</a></li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="noticias.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Noticias
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="noticias.php#novedades">Hoy</a></li>
                            <li><a class="dropdown-item" href="noticias.php#santonio">Nacional</a></li>
                            <li><a class="dropdown-item" href="#">Internacional</a></li>
                          </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Deportes
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Futbol</a></li>
                            <li><a class="dropdown-item" href="#">Tenis</a></li>
                            <li><a class="dropdown-item" href="#">Otros</a></li>
                          </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#!">Tecnologia</a></li>
                        <li class="nav-item"><a class="nav-link" href="sobre.html">Sobre El Faro</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

              <div class="carousel-item active">
                  <img src="img/robots.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="container px-4 px-lg-5">
                      <div class="row gx-4 gx-lg-5 align-items-center my-5">
                          <div class="col-lg-7"></div>
                          <div class="col-lg-5">
                            <div class="card">
                              <div class="container">
                                <p class="fst-italic">Nacional</p>
                                <a href="noticias.php#robotica" class="text-decoration-none"><h1>Robotica en las aulas</h1></a>
                                <p>La nueva idea de insertar nuevos ramos en base a las nuevas tecnologias</p>
                            </div>
                          </div> 
                        </div>   
                      </div>
                    </div>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="img/santonio.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <div class="container px-4 px-lg-5">
                      <div class="row gx-4 gx-lg-5 align-items-center my-5">
                          <div class="col-lg-7"></div>
                          <div class="col-lg-5">
                            <div class="card">
                              <div class="container">
                                <p class="fst-italic">Nacional</p>
                                <a href="noticias.php#santonio" class="text-decoration-none"><h1>Aumenta porcentaje de robos en San Antonio</h1></a>
                                <p>El robo de vehiculos a aumentado un 40% esta semana en la comuna de San Antonio</p>
                            </div>
                          </div> 
                        </div>   
                      </div>
                    </div>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="img/incendio.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    
                    <div class="container px-4 px-lg-5">
                      <div class="row gx-4 gx-lg-5 align-items-center my-5">
                          <div class="col-lg-7"></div>
                          <div class="col-lg-5">
                            <div class="card">
                              <div class="container">
                                <p class="fst-italic">Internacional</p>
                                <a href="#" class="text-decoration-none"><h1>Se expande incendio en Nakia Creek</h1></a>
                                <p>El incendio Nakia Creek se expande por fuertes vientos en el área, lo que obliga a miles de evacuaciones en el estado de Washington</p>
                            </div>
                          </div> 
                        </div>   
                      </div>
                    </div>
                  </div>  
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        <div class="container px-4 px-lg-5">

            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/usuarios.jpg" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Novedades</h1>
                    <p>Se han integrado paginas nuevas:<br>
                      Entre ellas estan, <a class="link-offset-2 link-underline link-underline-opacity-0" href="perfil.php">Perfil</a>, 
                      <a class="link-offset-2 link-underline link-underline-opacity-0" href="sobre.html">Sobre el proyecto</a>
                    </p>
                    <a class="btn btn-primary" href="noticias.php#novedades">Lea con mayor detalle aquí</a>
                </div>            
            </div>

            <!--div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Tarjeta de ejemplo</p></div>
            </div-->

            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia 1</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Leer más</a></div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia 2</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Leer más</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia 3</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">Leer más</a></div>
                    </div>
                </div>
            </div>
        
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

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <li class="page-item disabled">
              <a class="page-link">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Siguiente</a>
            </li>
          </ul>
        </nav>
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
