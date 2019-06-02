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
  </head>

  <body>
    <!-- header -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
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
      <br>
      <br>
      <div class ="container-fluid">
        <center><h1>PREGUNTAS FRECUENTES</h1></center><br><br>
        <div class ="row">
          <div class="col">
            <ol>
              <div class="card">
                <div class="card-body">
                  <li><strong>¿Es necesario que cree una cuenta para poder pedir uno de los pasteles del catálogo?</strong><br>Nuestro servicio sólo podemos proveerlo a nuestros usuarios, creando una cuenta podemos proteger la información bancaria y personal de nuestros clientes, así como ofrecer un mejor servicio</li>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-body">
                  <li><strong>¿Es necesario que cree una cuenta para poder pedir uno de los pasteles del catálogo?</strong><br>Nuestro servicio sólo podemos proveerlo a nuestros usuarios, creando una cuenta podemos proteger la información bancaria y personal de nuestros clientes, así como ofrecer un mejor servicio</li>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-body">
                  <li><strong>¿Están todos los productos a la venta?</strong><br>Sólo están a la venta aquellos que aparecen en nuestro catálogo y cuentan con el botón de comprar.</li>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-body">
                  <li><strong>¿Mis pasteles llegarán en buen estado?</strong><br>Nos aseguramos de que los pasteles se encuentren seguramente empaquetados a través de varios mecanismos para que no sufran desfiguros durante su traslado.</li>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-body">
                  <li><strong>¿Puedo hacer algún pedido especial?</strong><br>Por el momento sólo los productos del catálogo estan disponibls para su compra por internet, si requiere de algún producto distinto o especificaciones especiales sólo podrá ser a través del contacto con alguno de nuestros pasteleros.</li>
                </div>
              </div>
              <br>
              <div class="card">
                <div class="card-body">
                  <li><strong>¿Los pastles son hechos con ingredientes totalmente naturales?</strong><br>Para asegurar la calidad de nuestros pasteles utilizamos sólo productos 100% naturales, directamente de agricultores con los que tenemos tratos.</li>
                </div>
              </div>
            </ol>
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
