<?php
    session_start();
    include ("conexion.php");
    $conexion = new baseDatos();
    $usr = $_SESSION["usr"];
    $total = $_POST["comprarInp"];
    $fecha  = $_POST["fecha"];
    $pastel = $_POST["pastel"];
    $now = strtotime(date("d-m-Y",time()));
    $now2 = date("d-m-Y",time());
    $fechaUnix = strtotime($fecha);
    $diferencia = $fechaUnix-$now;
    if($diferencia>0){
        echo "gracias por su ".$now2." ".$usr;
    }else{
        echo "pedido no enviado";
    }
