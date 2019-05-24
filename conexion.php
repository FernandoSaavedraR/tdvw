<?php
		class baseDatos
		{
			private $conexion;
			private $usuario;
			private $pass;
			private $bd;
			private $servidor;
			public function __construct()
			{
					$this->user="root";
					$this->pass ="n0m3l0";
					$this->bd="tartedelavie";
					$this->servidor="localhost";
			}
			public function conectar()
			{
				$mysql = new mysqli($this->servidor,$this->user,$this->pass,$this->bd);
				return $mysql;
			}
			public function insertar($quert)
			{
				$con = $this->conectar();
				$con->query($quert);
				mysqli_close($con);
			}
			public function consultar($quert)
			{
				$con = $this->conectar();
				$resultados = $con->query($quert);
				// foreach($resultados as $r)
				// {
				// 	echo $r["pais"]." ".$r["continente"]."<br>";
				// }
				mysqli_close($con);
				return $resultados;
			}
			public function cambiar($nombre,$apellidos,$correo,$noma,$apa,$cora)
			{
				$quert="update users set nombre =\"$noma\", apellidos=\"$apa\", email =\"$cora\"	where nombre=\"$nombre\" and apellidos=\"$apellidos\" and email=\"$correo\";";
				$con = $this->conectar();
				$con->query($quert);
				mysqli_close($con);
			}
			public function eliminar($nombre,$apellidos,$correo)
			{
				$con = $this->conectar();
				$quert="delete from users where nombre=\"$nombre\" AND APELLIDOS=\"$apellidos\" AND EMAIL=\"$correo\";";
				$con->query($quert);
				mysqli_close($con);
			}
		}
?>