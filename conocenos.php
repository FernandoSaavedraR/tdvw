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
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css" />
    <title>Tarte de la vie</title>
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
              }
              else{
                  $template = '<button type="button" class="btn btn-success" 
                  onclick="location.href=\'login.php\'">
                  Iniciar sesión
                  </button>';
                  echo $template;
                }
            ?>
              
          </ul>
        </div>
      </div>
    </nav>
    <!-- /header -->
    <!-- main -->
    <section id="pasteleros">
      <div class="container">
        <div class="row mt-2 text-center">
          <div class="col">
            <small>Conoce a</small>
            <h2>nuestros pasteleros</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class=" offset-lg-2 col-lg-4 col-md-6 mb-2">
            <div class="card" >
              <img src="./img/inge.jpg" class="card-img-top p-1" alt="pastelero img" />
              <div class="card-body">
                <h5 class="card-title">Javi Lopez</h5>
                <p class="card-text">
                  Pastelero desde los 15 años, capaz de hacerte el mejor
                  pastel imposible con los ojos cerrados.
                </p>
                <a href="#" class="btn btn-primary">Visita su facebook</a>
              </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-2">
            <div class="card" >
              <img src="./img/julio.jpg" class="card-img-top p-1" alt="pastelero img" />
              <div class="card-body">
                <h5 class="card-title">Julio Zuñiga</h5>
                <p class="card-text">
                  Creció en un barrio lejano donde los pasteleros entrenan con
                  tigres, si necesitas un pastel el lo hace.
                </p>
                <a href="#" class="btn btn-primary">Visita su facebook</a>
              </div>
            </div>
            </div>
            <div class="offset-lg-2 col-lg-4 col-md-6 mb-2">
            <div class="card" >
              <img src="./img/hunny.jpg" class="card-img-top p-1" alt="pastelero img" />
              <div class="card-body">
                <h5 class="card-title">Zitlaly Círigo</h5>
                <p class="card-text">
                  Un mounstruo haciendo pasteles, si lo necesitas
                  ella lo hace.
                </p>
                <a href="#" class="btn btn-primary">Visita su facebook</a>
              </div>
            </div>
            </div>
            <div class=" col-lg-4 col-md-6 mb-2"">
            <div class="card" >
              <img src="./img/fer.jpeg" class="card-img-top p-1" alt="pastelero img" />
              <div class="card-body">
                <h5 class="card-title">Fernando Saavedra</h5>
                <p class="card-text">
                  que su apariencia no te engañe, es el mejor pastelero de la costa
                  oeste.
                </p>
                <a href="#" class="btn btn-primary">Visita su facebook</a>
              </div>
            </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /main -->
    <!-- footer -->
    <footer id="footer" class="pb-3 pt-3">
      <div class="container">
        <div class="row text-center">
          <div class="col-12 col-lg">
            <a href="#" -12>Preguntas frecuentes</a>
          </div>
          <div class="col-12 col-lg">
            <a href="mailto:tartedelavie@gmail.com">Contactanos</a>
          </div>
          <div class="col-12 col-lg">Derechos reservados Inges Inc &copy</div>
        </div>
      </div>
    </footer>
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
