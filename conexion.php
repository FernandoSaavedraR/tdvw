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
					$this->servidor="127.0.0.1:3306";
			}
			public function conectar()
			{
				$mysql = new mysqli($this->servidor,$this->user,$this->pass,$this->bd);
				return $mysql;
			}
			public function insertar($quert)
			{
				$con = $this->conectar();
				$res=$con->query($quert);
				return $res;
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
			public function sesion($user, $pass){
				$con = $this->conectar();
				$quert = "call login(\"$user\",\"$pass\");";
				$resultados = $con->query($quert);
				return $resultados;
				mysqli_close($con);
				
			}
			public function c_Producto(){
				$con = $this->conectar();
				$quert = "select * from producto";
				$resultados = $con->query($quert);
				return $resultados;
				mysqli_close($con);
			}
			public function act_datos($nombre,$apellidos,$direccion,$sexo,$usr){
				$con = $this->conectar();
				$quert = "Call ACT_DATOS(\"$nombre\",\"$apellidos\",$sexo,\"$direccion\" ,\"$usr\");";
				$resultados = $con->query($quert);
				mysqli_close($con);
			}
			public function act_datos_tarjeta($nombre,$apellidos,$direccion,$sexo,$usr,$tarjeta,$caducidad,$cvv){
				$con = $this->conectar();
				$quert = "CALL ACT_DATOS_TARJETA(\"$nombre\",\"$apellidos\",$sexo,\"$direccion\" ,\"$usr\",
				\"$tarjeta\",$cvv,\"$caducidad\");";
				$resultados = $con->query($quert);
				mysqli_close($con);
			}
			public function llenar($usr){
				$con = $this->conectar();
				$quert = "call cons_usr(\"$usr\")";
				$resultados = $con->query($quert);
				return $resultados;
				mysqli_close($con);
			}
			public function compra_normal($factual,$fpedida,$pastel,$usr,$cantidad)
			{
				$con = $this->conectar();
				$quert = "CALL COMPRA_NORMAL(STR_TO_DATE(\"$factual\",'%d-%m-%Y'),STR_TO_DATE(\"$fpedida\",'%d-%m-%Y'),\"$pastel\",\"$usr\",$cantidad)";
				$resultados = $con->query($quert);
				return $resultados;
			}
		}
?>

