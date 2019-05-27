<?php
    include ("conexion.php");
    $conexion = new baseDatos();
    $usr = $_POST["usuario"];
    $pass = $_POST["pass"];
    $json_array = array();
    $var = $conexion->sesion($usr,$pass);
    foreach($var as $r){
        $json_array = $r;
    }
    if($json_array["SESION"]==1){
        session_start();
        $_SESSION['usr'] = $json_array["USUARIO"];
        $_SESSION['sesion'] = $json_array["SESION"];
    }else{
        
    }
    echo json_encode($json_array);
   
   