<?php
    session_start();
    include ("conexion.php");
    $conexion = new baseDatos();
    if (isset($_SESSION["usr"])) {
        $usr = $_SESSION["usr"];
        $total = $_POST["comprarInp"];
        $fecha  = $_POST["fecha"];
        $pastel = $_POST["pastel"];
        $now = strtotime(date("d-m-Y", time()));
        $now2 = date("d-m-Y", time());
        $fechaUnix = strtotime($fecha);
        $fecha2=  date("d-m-Y", $fechaUnix);
        $diferencia = $fechaUnix-$now;
        if ($diferencia>0) {
            $resultados = $conexion->compra_normal($fecha2, $now2, $pastel, $usr, $total);
            foreach ($resultados as $r) {
                echo $r["MENSAJE"];
            }
        }
    }else{
        echo "pedido no enviado";
    }
