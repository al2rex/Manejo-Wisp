<?php
session_start();
class facturacion{
	private $conexion;

	function __construct(){
		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}
	function generar_facturas($inicial, $final){
		//print_r($_POST);
		//****** dato de la empresa
		
		$sql = " select id_empresa from empresa; ";
		$stmt = $this->conexion->conexion->prepare($sql);
		$stmt->execute();
		$emp = $stmt->fetch();
		$id_empresa = $emp[0];

		//***** seleccionamos todos los clientes para rellenar las facturas
		$query = " select * from clientes ";
		$stmt = $this->conexion->conexion->prepare($query);
		$stmt->execute();
		$r = array();
		while($row = $stmt->fetch()){
			$r[] = $row;
		}
		$j = 0;
		for($i=0;$i<sizeof($r);$i++){
			if($r[$i]["estado"]=="Activo"){
				$id_cliente = $r[$i]["id_cliente"];

				$insert  = " insert into facturas values (null, '', ?, ?, ?, ?, ?, now(), ?); ";
				$stmt = $this->conexion->conexion->prepare($insert);

				$stmt->bindParam(1,$inicial);
				$stmt->bindParam(2,$final);
				$stmt->bindParam(3,$id_empresa);
				$stmt->bindParam(4,$id_cliente);
				$stmt->bindParam(5,$estado);
				$stmt->bindParam(6,$usuario);
				$estado = "No Pago";
				$usuario = $_SESSION["id_usuario"];

				$stmt->execute();
				$id_factura = $this->conexion->conexion->lastInsertId();

				$update = " update facturas set cod_fact = ? where id_fact = ? ";
				$stmt = $this->conexion->conexion->prepare($update);

				$codFac = date("ymd").$id_factura;

				$stmt->bindParam(1,$codFac);
				$stmt->bindParam(2,$id_factura);
				
				
				
				$stmt->execute();

				$j++;
				
			}else{
				echo "Cliente con nombre ".$r[$i]["nombre"]." e identificado con numero ".$r[$i]["dni"]." Sistema no le generó factura ya que tiene un estado diferente a estado 'Activo' ";
			}
			//echo $codFac;
			echo " ";
		}
		echo "Total facturas ".$j;
	}

	function listar_facturas($valor){
		$sql = "select * from facturas as f, clientes as c, planes as p where f.id_cliente = c.id_cliente and c.id_plan = p.id_plan and c.dni LIKE ? order by f.id_fact desc; ";
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
}

?>