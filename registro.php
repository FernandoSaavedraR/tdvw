<?php
      if(isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["usuario"])
      && isset($_POST["pass"]) && isset($_POST["sexo"]) && isset($_POST["direccion"])
      && isset($_POST["tarjeta"])&& isset($_POST["caducidad"])&& isset($_POST["cvv"])){
          include("conexion.php");
          $NOMBRE =$_POST["nombre"];
          $APELLIDOS=$_POST["apellidos"];
          $SEXO = $_POST["sexo"];
          $USUARIO = $_POST["usuario"];
          $PASS = $_POST["pass"];
          $dir = $_POST["direccion"];
          $tarjeta = $_POST["tarjeta"];
          $banco = $_POST["caducidad"];
          $cvv = $_POST["cvv"];
          $conn = new baseDatos();
          $quert = "CALL  ALTA_CLIENTE('$NOMBRE','$APELLIDOS',$SEXO,'$USUARIO','$PASS','$dir','$tarjeta',$cvv,'$banco')";
          $resultados = $conn->insertar($quert);
          
      } 

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href=" ./bootstrap/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css" />
    <title>Tarte de la vie</title>
  </head>

  <body>
    <!-- header -->
    <?php
       session_start();
       if (isset($_SESSION["usr"])) {
        header("location:./index.php");
      }else{
        
      }
    ?>
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
              <a class="nav-link" href="index.php"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link" href="conocenos.php">¡Conócenos!</a>
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link " href="catalogo.php" tabindex="-1" aria-disabled="true"
                >Nuestros Pasteles</a
              >
            </li>
            <li class="nav-item ml-3">
              <a
                class="nav-link resaltado"
                href="registro.php"
                tabindex="-1"
                aria-disabled="true"
                >Registrate</a
              >
            </li>
            <li class="nav-item ml-3">
              <button type="button" class="btn btn-success" onclick="location.href='login.php'">
                Iniciar sesión
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /header -->
    <!-- main -->
    <main>
      <div class="container">
        <div class="row text-center">
          <div class="offset-lg-3 col-lg-6 mt-3">
            <small>Registro de</small>
            <h2>Usuario</h2>
          </div>
        </div>
      </div>
      <form method="POST">
        <div class="row m-2 align-middle">
          <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="nombre">Nombres</label>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <input
              type="text"
              id="nombre"
              name="nombre"
              class="form-control"
              placeholder="Nombres"
            />
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="apellidos">Apellido</label>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <input
              type="text"
              id="apellidos"
              name="apellidos"
              class="form-control"
              placeholder="Apellidos" />
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="direccion">Direccion</label>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <input
              type="text"
              id="direccion"
              name="direccion"
              class="form-control"
              placeholder="Direccion" />
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="usuario">Usuario</label>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <input
              type="text"
              id="usuario"
              name="usuario"
              class="form-control"
              placeholder="Usuario" />
          </div>
		  <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="pass">Contraseña</label>
          </div>
		  <div class="offset-lg-3 col-lg-6 mt-3">
            <input
              id="pass"
              type="password"
              name="pass"
              class="form-control"
              placeholder="contraseña" />
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="sexo">Sexo</label>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <select id="sexo" name="sexo" id="">
              <option value="1">Hombre</option>
              <option value="0">Mujer</option>
            </select>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3">
            <label for="">Tarjeta</label>
            </div>
            <div class="offset-lg-3 col-lg-6 mt-3">
              <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="tarjeta">
            </div>
            <div class="offset-lg-3 col-sm-6 col-lg-3 mt-3">
              <input type="text" class="form-control" id="caducidad"name="caducidad" placeholder="Banco">
            </div>
            <div class="col-sm-6 col-lg-3 mt-3">
              <input type="text" class="form-control" id="cvv" name="cvv" placeholder="cvv">
            </div>
          </div>
          <div class="offset-lg-3 col-lg-6 mt-3 text-center" >
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
        </div>
        
      </form>
      
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
      src="bootstrap\js\bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
   
  </body>
</html>
