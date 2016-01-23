<?php
	class nodos{
	private $conexion;
	//private $datos;

	public function __construct(){
		//$this->datos = array();
		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	public function listar_nodos($buscar,$inicio=false,$nroreg=false){
		if($inicio!==false and $nroreg!==false){
			$sql = " select * from nodos where nombre_nodo like ? limit $inicio, $nroreg; ";
		}else{
			$sql = " select * from nodos where nombre_nodo like ?; ";
		}
		
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1,'%'.trim($buscar).'%');

		$stmt->execute();
		$r= array();
		while($row = $stmt->fetch()){
			$r[] = $row;
		}
		return $r;
	}
	function listarNodos(){//en la pagina del crear cliente utilizo este metodo
		$sql = " select * from nodos; ";
		$r = array();
		foreach ($this->conexion->conexion->query($sql) as $row){
			$r[] = $row;
		}
		return $r;
		$this->conexion->cerrar();
	}
	public function ingresar_nodos($nombre,$descripcion,$direccion){
		$sql = " select * from nodos where nombre_nodo = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array( $nombre ) );
		$num = $stmt->rowCount();
		if($num==0){
			$query = " insert into nodos values (null, ?, ?, ?); ";
			$stmt = $this->conexion->conexion->prepare($query);

			$stmt->bindParam(1,$nombre);
			$stmt->bindParam(2,$descripcion);
			$stmt->bindParam(3,$direccion);

			if($stmt->execute()){
				return "exito";
			}else{
				return "no_exito";
			}
		}else{
			return "existe";
		}
	}
	public function actualizar_nodos($descripcion,$direccion,$id){
		$sql = " UPDATE nodos set descripcion_nodo = ?, direccion_nodo = ? where id_nodo = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindParam(1,$descripcion);
		$stmt->bindParam(2,$direccion);
		$stmt->bindParam(3,$id);

		if($stmt->execute()){
			return "exito";
		}else{
			return "no_exito";
		}
	}
}

?>