<?php
session_start();
class clientes{

	private $conexion;

	function __construct(){
		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	function listar_clientes($valor){
		$sql = " select * from clientes where dni like ? or nombre like ? order by id_cliente desc; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1,'%'.trim($valor).'%');
		$stmt->bindValue(2,'%'.trim($valor).'%');
		$stmt->execute();
		$r = array();
		while($row = $stmt->fetch()){
			$r[] = $row;
		}
		return $r;
		$this->conexion->cerrar();
	}
	function clientes_por_id($ced){
		$sql = "select * from clientes as c, nodos as n, planes as p where c.id_nodo = n.id_nodo and c.id_plan = p.id_plan and c.dni = ?;";
		$stmt = $this->conexion->conexion->prepare($sql);
		$stmt->execute( array( $ced ) );
		$num = $stmt->rowCount();
		if($num==0){
			return "no_registro";
			$this->conexion->cerrar();
		}else{
			$r = array();
			if($row = $stmt->fetch()){
				$r[] = $row;
			}
			return $r;
			$this->conexion->cerrar();
		}
	}
	function registrar_cliente($dni, $nombrec, $dir, $tel, $correo, $rango, $usuh, $passh, $frecu, $obser, $nodo, $plan, $estado){
		$sql = " select dni from clientes where dni = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array( $dni ) );
		$num = $stmt->rowCount();
		if($num==0){
			$query = " insert into clientes values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, now(), ?); ";
			$stmt = $this->conexion->conexion->prepare($query);

			$stmt->bindParam(1,$dni);
			$stmt->bindParam(2,$nombrec);
			$stmt->bindParam(3,$dir);
			$stmt->bindParam(4,$tel);
			$stmt->bindParam(5,$correo);
			$stmt->bindParam(6,$rango);
			$stmt->bindParam(7,$usuh);
			$stmt->bindParam(8,$passh);
			$stmt->bindParam(9,$frecu);
			$stmt->bindParam(10,$obser);
			$stmt->bindParam(11,$nodo);
			$stmt->bindParam(12,$plan);
			$stmt->bindParam(13,$estado);
			$stmt->bindParam(14,$usuario);

			$usuario = $_SESSION["id_usuario"];

			if($stmt->execute()){
				return "exito";
			}else{
				return "no_exito";
			}
		}else{
			return "existe";
		}
	}

}


/*$inst = new clientes();
$r = $inst->registrar_cliente('1047464480','kat castila','cra 59b','6765877','katecastilla99@hotmail.com','192.168.1.200 - 192.168.1.250','','','5 Ghz','N/A','2','2','No Activo');
print_r($r);*/
?>