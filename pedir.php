<?php
    session_start();
    include ("conexion.php");
    $conexion = new baseDatos();
    $usr = $_SESSION["usr"];
    if (isset($_SESSION["usr"])) {
        $resultados = $conexion -> pedidos($usr);
        $json_array = array();
        foreach ($resultados as $r) {
           array_push($json_array,$r);
        }
        echo json_encode($json_array);
    }