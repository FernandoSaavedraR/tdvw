<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form login | Fazt</title>
	 <link
      rel="stylesheet"
      href="./bootstrap/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="sweet\sweetalert2.min.css">
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  </head>
  <body>
  
  <div class="container ">
		<div class="login-box row ">
			<img class="logo" src="img/descarga.jpg" alt="logo de fondo">
			<h1>Inicia Sesión</h1>
			<form id="formulario">
			  <label for="username">Usuario</label>
			  <input type="text" name="usuario" placeholder="&#9787;Usuario">

			  <label for="password">Contraseña</label>
			  <input type="password" name="pass" placeholder="&#128273;Contraseña">

			  <input type="submit" id="login" value="Login in"><br/>

			  
		 </div>
    </div>
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
      <img src="./img/logowhite.svg" class="logo" style="height:56px;"alt="logo">
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
    <script src="./js/login.js"></script>
    <script src="sweet\sweetalert2.min.js"></script>
    
  </body>
</html>
