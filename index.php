<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="./bootstrap/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Tarte de la vie</title>
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
  </head>

  <body>
    <!-- header -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <img src="./img/logowhite.svg" class="logo" alt="logo">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active ml-3">
              <a class="nav-link" href="./index.php"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link" href="./conocenos.php">¡Conócenos!</a>
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link " href="catalogo.php" tabindex="-1" aria-disabled="true"
                >Nuestros Pasteles</a
              >
            </li>
            <li class="nav-item ml-3">
            <?php
              $template;
                session_start();
                if (isset($_SESSION["usr"])) {
                    if ($_SESSION['sesion']==1) {
                        $template = '<a
                  class="nav-link resaltado"
                  href="./perfil.php"
                  tabindex="-1"
                  aria-disabled="true"
                  >¡tu Perfil '.$_SESSION["usr"].'!</a
                  >';
                        echo $template;
                    }
                }else{
                  $template = '<a
                  class="nav-link resaltado"
                  href="registro.php"
                  tabindex="-1"
                  aria-disabled="true"
                  >Registrate</a
                  >';
                  echo $template;
                }
           
              
            ?>
            </li>
            <li class="nav-item ml-3">
              
            <?php
              $template;
              if (isset($_SESSION["usr"])) {
                  if ($_SESSION['sesion']==1) {
                      $template = '<button type="button" class="btn btn-success" 
                  onclick="location.href=\'logout.php\'">
                  cerrar sesión
                  </button>';
                      echo $template;
                  }
              }else{
                  $template = '<button type="button" class="btn btn-success" 
                  onclick="location.href=\'login.php\'">
                  Iniciar sesión
                  </button>';
                  echo $template;
                }
            ?>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /header -->
    <!-- main -->
    <main>
      <div
        id="carouselExampleControls"
        class="carousel slide "
        data-ride="carousel"
        data-pause="false"
      >
        <div class="carousel-inner p-1">
          
          <div class="carousel-item active">
            <img src="./img/BANNER1.jpg" class="d-block w-100" alt="img-crsl" />
          </div>
          <div class="carousel-item">
            <img src="./img/ffm.jpg" class="d-block w-100" alt="img-crsl" />
          </div>
          <div class="carousel-item">
            <img src="./img/natural.jpg" class="d-block w-100" alt="img-crsl" />
          </div>
          <div class="carousel-item">
            <img src="./img/bantresl.jpg" class="d-block w-100" alt="img-crsl" />
          </div>
          <!--<div class="carousel-item">
            <img src="./img/f1.jpg" class="d-block w-100" alt="img-crsl" />
          </div>-->
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleControls"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleControls"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class ="container-fluid">
        <div class ="row">
          <div class="col">
              <div class="card">
                <div class="card-body">
                  <div class ="container-fluid">
                    <div class ="row">
                      <div class="col"><center><img src="./img/telepersona.jpg"/></center></div>
                      <div class="col">
                        <p class="card-text text-center"><h2>¿CÓMO COMPRAR?</h2><br>
                           <ol>
                             <li>Crea una cuenta o inicia sesión</li>
                             <li>Elige tu pastel favorito de nuestro catálogo</li>
                             <li>Da click en el botón ¡Comprar!</li>
                           </ol><br>
                           <strong style="color:green;"><center>FÁCIL Y SENCILLO ~ Disfruta nuestros deliciosos pasteles</center></strong>
                         </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div> 
      </div>
      <div class ="container-fluid">
        <div class ="row">
          <div class="col">
              <div class="card">
                <div class="card-body">
                  <div class ="container-fluid">
                    <div class ="row">
                      <div class="col"><center><img src="./img/envio.jpg" style="width:  12em;"/></center></div>
                      <div class="col">
                        <p class="card-text text-center"><h2>DISFRUTA DE NUESTRO ENVÍO GRÁTIS</h2><br><br>
                          Envío grátis durante todos los días de la semana.<br>
                          Lísto para cuando lo necesites.<br><br>
                          <center><h2 style="color: green;">ORDENA YA!!</h2></center>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div> 
      </div>
    </main>
    <!-- /main -->
    <!-- footer -->
    <!-- /footer -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
