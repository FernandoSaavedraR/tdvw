<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./css/modal.css" />
  <title>Tarte de la vie</title>
</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active ml-3">
            <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ml-3">
            <a class="nav-link" href="./conocenos.php">¡Conócenos!</a>
          </li>
          <li class="nav-item ml-3">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Nuestros Pasteles</a>
          </li>
          <li class="nav-item ml-3">
          <?php
              $template;
                session_start();
                if($_SESSION['sesion']==1)
                {
                  $template = '<a
                  class="nav-link resaltado"
                  href="./perfil.php"
                  tabindex="-1"
                  aria-disabled="true"
                  >¡tu Perfil '.$_SESSION["usr"].'!</a
                  >';
                  echo $template;
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
                session_start();
                if($_SESSION['sesion']==1)
                {
                  $template = '<button type="button" class="btn btn-success" 
                  onclick="location.href=\'logout.php\'">
                  cerrar sesión
                  </button>';
                  echo $template;
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
  <div class="container mt-3" id="catalogo">
      <div class="row offset-2 offset-md-0">
     
    <?php
        include ("conexion.php");
        $conexion = new baseDatos();
        $resultados = $conexion->c_Producto();
        foreach($resultados as $r)
        {
          if($_SESSION['sesion']==1)
                {
          $template = '
          <div class="col-lg-4 col-md-6 mb-2">
          <div class="card" style="width: 18rem;">
              <img src="'.$r["IMG"].'" class="card-img-top p-1" alt="...">
              <div class="card-body">
                <p class="card-text text-center"><strong>'.$r["NOMBRE"].'</strong><br> Precio: $'.$r["PRECIO"].'<br>'.$r[DESCRIPCION].'<br>
              <button type="button" data-name="'.$r["NOMBRE"].'" data-price="'.$r["PRECIO"].'"class="btn btn-success" onclick="funcion(event)">¡Comprar!</button>
          </div></div></div>';
                }
          else{
            $template = '
          <div class="col-lg-4 col-md-6 mb-2">
          <div class="card" style="width: 18rem;">
              <img src="'.$r["IMG"].'" class="card-img-top p-1" alt="...">
              <div class="card-body">
                <p class="card-text text-center"><strong>'.$r["NOMBRE"].'</strong><br> Precio: $'.$r["PRECIO"].'<br>'.$r[DESCRIPCION].'<br>
                <strong> inicie sesion para comprar </strong>
          </div></div></div>';
          }
          echo $template;
        }
       
     ?>
      
   </div>
  </div>
  <div class="overlay" id="overlay"></div>
  <!-- /main -->
  <div class="modal" id="modall" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Comprar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!--<span id="hide-modalA"aria-hidden="true">&times;</span>-->
        </button>
      </div>
      <div class="modal-body">
        <p id="modalCompra">Modal body text goes here.</p>
      </div>
      <form id="formulario">
        <div class="container mb-1">
          <div class="row mb-2">
            <div class="col">
              <label for="comprarInp">Cuantos desea</label>
            </div>
            <div class="col">
              <input type="number" class="form-control" id="comprarInp" name="comprarInp" placeholder="Solo numeros" required>
            </div>
          </div>
          <div class="row">
          <div class="col">
              <label for="fecha">Fecha de entrega</label>
            </div>
            <div class="col">
            <input id="fecha" name="fecha" class="form-control" type="date" required>
            </div>
          </div>
          <div class="row">
          <div class="col">
              <strong>total:</strong>
              <p id="total" style="display:'inline';"></p>
            </div>
          </div>
        </div>
        <input type="text" id="secreto" name="pastel" hidden>
    </form>
      <div class="modal-footer text-center">
        <p id="futer"></p>
        <button type="submit" id="comprar-btn" class="btn btn-primary">Comprar</button>
        <button type="button" id="hide-modal"class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
  <!-- footer -->
  <!-- /footer -->
  <script src="./js/comprar.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
