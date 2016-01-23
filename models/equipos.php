<?php
class equipos{
	private $conexion;

	function __construct(){
		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}
	function listar_equipo($valor,$inicio=false,$nroreg=false){
		if($inicio!==false and $nroreg!==false){
			$sql = " select * from equipos where nombre_equi like ? or marca like ? or serie = ? order by id_equipos desc limit $inicio, $nroreg; ";
		}else{
			$sql = " select * from equipos where nombre_equi like ? or marca like ? or serie = ? order by id_equipos desc; ";
		}
		
		//$this->conexion->conexion->set_charset('utf8');
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1,'%'.trim($valor).'%');
		$stmt->bindValue(2, '%'.trim($valor).'%');
		$stmt->bindValue(3, '%'.trim($valor).'%');
		$stmt->execute();
		$r = array();
		while($row = $stmt->fetch()){
			$r[] = $row;
		}
		return $r;
		$this->conexion->cerrar();
	}
	function registrar_equipo($nom, $tipo, $marca, $serial, $mac){
		$sql = " select * from equipos where serie = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);
		$stmt->execute( array($serial) );
		$num = $stmt->rowCount();
		//echo "->".$num;
		if($num==0){
			$query = " insert into equipos values (null, ?, ?, ?, ?, ?, now(),null); ";
			$stmt = $this->conexion->conexion->prepare($query);

			$stmt->bindParam(1,$nom);
			$stmt->bindParam(2,$tipo);
			$stmt->bindParam(3,$marca);
			$stmt->bindParam(4,$serial);
			$stmt->bindParam(5,$mac);

			if($stmt->execute()){
				return "exito";
			}else{
				return "no_exito";
			}
		}else{
			return "repetido";
		}

	}
	function actualizar_equipo($nombre, $tipo, $marca, $mac, $id){
		$sql = " UPDATE equipos set nombre_equi = ? ,tipo = ?, marca = ?, mac = ?  WHERE id_equipos = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindParam(1,$nom);
		$stmt->bindParam(2,$tip);
		$stmt->bindParam(3,$mar);
		$stmt->bindParam(4,$dmac);
		$stmt->bindParam(5,$id_antena);

		$nom = $nombre;
		$tip = $tipo;
		$mar = $marca;
		$dmac = $mac;
		$id_antena = $id;

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}		
	}
	function equipos_asignados($id){/// esta la utilizo para los equipos relacionado entre el cliente y los nodos 
		$sql = " select * from equipos where id_nod_clie = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array( $id ) );
		$num = $stmt->rowCount();
		if($num==0){
			return "no_registro";
		}else{
			$r = array();
			while($row = $stmt->fetch()){
				$r[] = $row;
			}
			return $r;
			$this->conexion->cerrar();
		}
	}
	function equipos_asignados_nodos($id){//este es para seleccionar los equipos que pertenecen a un nodo y se utiliza en el cliente
		$sql = " select * from equipos as e, nodos as n where e.id_nod_clie = n.id_nodo and  e.id_nod_clie = ?; ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute( array( $id ) );
		$num = $stmt->rowCount();
		if($num==0){
			return "no_registro";
		}else{
			$r = array();
			while($row = $stmt->fetch()){
				$r[] = $row;
			}
			return $r;
			$this->conexion->cerrar();
		}
	}
}
/*$inst = new equipos();
$r = $inst->equipos_asignados('1');
print_r($r);*/

?>