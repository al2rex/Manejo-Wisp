<?php
class planes{
	private $conexion;

	function __construct(){
		include("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}
	function listar_planes($buscar){
		$sql = " select * from planes where nombre_plan like ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);
		//echo "$sql";exit;

		$stmt->bindValue(1,'%'.trim($buscar).'%');

		$stmt->execute();
		$r = array();
		while($row = $stmt->fetch()){
			$r[] = $row;
		}
		return $r;
		//$this->conexion->cerrar();
	}
	function listarPlanes(){//en la pagina del crear cliente utilizo este metodo
		$sql = " select * from planes; ";
		$r = array();
		foreach ($this->conexion->conexion->query($sql) as $row){
			$r[] = $row;
		}
		return $r;
		$this->conexion->cerrar();
	}
	function registrar_planes($nom, $vb, $tb, $vs, $ts, $pre){
		$sql = " select nombre_plan from planes where nombre_plan = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array( $nom ) );
		$num = $stmt->rowCount();
		if($num==0){
			$query = " insert into planes values (null, ?, ?, ?, ?, ?, ?); ";
			$stmt = $this->conexion->conexion->prepare($query);

			$stmt->bindParam(1,$nom);
			$stmt->bindParam(2,$vb);
			$stmt->bindParam(3,$tb);
			$stmt->bindParam(4,$vs);
			$stmt->bindParam(5,$ts);
			$stmt->bindParam(6,$pre);

			if($stmt->execute()){
				return 'exito';
			}else{
				return 'no_exito';
			}
			$this->conexion->cerrar();

		}else{
			return 'existe';
		}
	}
}

?>