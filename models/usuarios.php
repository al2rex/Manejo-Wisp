<?php
session_start();
class usuarios{
	private $conexion;
	
	public function __construct()
	{
		
		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}
	public function identificar($nick, $pass){
		$pass = sha1($pass);
		$sql = " select * from usuarios where nick = ? and pass = ? and estado = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array($nick, $pass, "activo") );
		$num = $stmt->rowCount(); 
		//echo $num;exit;
		$r = array();		
		if($num==0){
			return "no_ingreso";
		}else{
			if($row = $stmt->fetch())
			{
				$r[]=$row;
			}
			$_SESSION["id_usuario"]=$r[0][0];
			$_SESSION["usuario"]=$r[0][1];
			$_SESSION["nombre"]=$r[0][3];
			$_SESSION["roll"]=$r[0][5];
			$_SESSION["ingreso"]="yes";
			return "exito";
		}
		return $r;
		$this->conexion->cerrar();

	}
	function Listar_usuarios($valor){
		$sql = " select id_usuario, nick, nombre, email, roll, estado from usuarios where nombre LIKE ? order by id_usuario desc; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1,'%'.trim($valor).'%');

		$stmt->execute();
		$r = array();
		while($row = $stmt->fetch()){
			$r[] = $row;
		}
		return $r;
		$this->conexion->cerrar();
	}
	public function registrar_usuario($nick, $pass, $nombre, $email, $roll, $estado){
		
		$pass = sha1($pass);
		
		$query = " select nick, email from usuarios where nick = ? or email = ? ";
		$stmt = $this->conexion->conexion->prepare($query);

		$stmt->bindParam(1, $nick);
		$stmt->bindParam(2,$email);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0){
			$sql = "insert into usuarios values(null, ?, ?, ?, ?, ?, ?, now()); ";
			$stmt = $this->conexion->conexion->prepare($sql);

			$stmt->bindParam(1,$nick);
			$stmt->bindParam(2,$pass);
			$stmt->bindParam(3,$nombre);
			$stmt->bindParam(4,$email);
			$stmt->bindParam(5,$roll);
			$stmt->bindParam(6,$estado);

			if($stmt->execute())
			{
				return "exito";
			}else{
				return "no_exito";
			}
			return $this->datos;
		}else{
			return "existe";
		}
		$this->conexion->cerrar();
	}
	function usuarios_x_id($cod){
		$sql = " select * from usuarios where id_usuario = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array( $cod ) );
		$num = $stmt->rowCount();
		if($num==0){
			echo "No se encontro nningun usuario";
		}else{
			$r = array();
			if($row = $stmt->fetch()){
				$r[] = $row;
			}
			return $r;
			$this->conexion->cerrar();
		}
	}
}
		/*$ins = new usuarios();
		$r = $ins->usuarios_x_id('1');
		print_r($r)*/
		
?>