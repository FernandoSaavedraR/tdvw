<?php
    include ("conexion.php");
    $conexion = new baseDatos();
    $id = $_GET["id"];
    $resultados = $conexion ->cancelar($id);
    foreach($resultados as $r)
    {
        echo $r["MENSAJE"];
    }