<?php
class empresa{
	private $conexion;

	function __construct(){
		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	function empresa(){
		$sql = " select * from empresa ";
		$stmt = $this->conexion->conexion->prepare($sql);
		$r = array();
		if($stmt->execute()){
			if($row = $stmt->fetch()){
				$r[] = $row;
			}
		}
		return $r;
		$this->conexion->cerrar();
	}
	function registrar_datos_empresa($id, $nit, $nom, $dir, $tel, $correo){
		$sql = " select * from empresa ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->execute();

		$reg = $stmt->rowCount();

		if($reg==0){
			$insert = " insert into empresa values(null, ?, ?, ?, ?, ?, now()) ";
			$stmt = $this->conexion->conexion->prepare($insert);
			$stmt->bindParam(1,$nit);
			$stmt->bindParam(2,$nom);
			$stmt->bindParam(3,$dir);
			$stmt->bindParam(4,$tel);
			$stmt->bindParam(5,$correo);
			if($stmt->execute()){
				return "insert_exito";
			}else{
				return "insert_no_exito";
			}
		}else{
			$update = " UPDATE empresa set nit = ?, nombre_emp = ?, direccion_emp = ?, telefono_emp = ?, email = ? where id_empresa = ? ";
			$stmt = $this->conexion->conexion->prepare($update);
			$stmt->bindParam(1,$nit);
			$stmt->bindParam(2,$nom);
			$stmt->bindParam(3,$dir);
			$stmt->bindParam(4,$tel);
			$stmt->bindParam(5,$correo);
			$stmt->bindParam(6,$id);
			if($stmt->execute()){
				return "update_exito";
			}else{
				return "update_no_exito";
			}
		}

	}
}


?>