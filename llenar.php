<?php
    session_start();
    include ("conexion.php");
    $conexion = new baseDatos();
    $usr = $_SESSION["usr"];
    $resultados = $conexion -> llenar($usr);
    $json_array = array();
    foreach($resultados as $r){
        $json_array = $r;
    }
    echo json_encode($json_array);