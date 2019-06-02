<?php
    session_start();
    include ("conexion.php");
    $conexion = new baseDatos();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $sexo = $_POST["sexo"];
    $tarjeta = $_POST["tarjeta"];
    $caducidad = $_POST["caducidad"];
    $cvv = $_POST["cvv"];
    if (isset($_SESSION["usr"])) {
        $usr = $_SESSION["usr"];
        if (empty($nombre) || empty($apellido) || empty($direccion)) {
            echo json_encode("error");
        } else {
            if (empty($tarjeta) ||empty($caducidad) ||empty($cvv)) {
                $conexion->act_datos($nombre, $apellido, $direccion, $sexo, $usr);
                echo  json_encode("datos actualizados");
            } else {
                $conexion->act_datos_tarjeta($nombre, $apellido, $direccion, $sexo, $usr, $tarjeta, $caducidad, $cvv);
                echo json_encode("actualizar tarjeta");
            }
        }
    }
?>