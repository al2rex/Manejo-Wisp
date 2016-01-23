<?php
require_once("../models/clientes.php");
require_once("../models/equipos.php");
$boton = $_POST["boton"];
switch ($boton) {
	case 'buscar':
		$valor = $_POST["valor"];
		$inst = new clientes();
		$r = $inst->listar_clientes($valor);
		echo json_encode($r);
		break;
	case 'buscar_id':
		$cedula = $_POST["valor"];
		$inst = new clientes();
		$r = $inst->clientes_por_id($cedula);
		echo json_encode($r);
		break;
	case 'equipos':
		$id = $_POST["id"];
		$inst = new equipos();
		$r = $inst->equipos_asignados($id);
		echo json_encode($r);		
	break;
	case 'nodo':
		$id_nodo = $_POST["id_nodo"];
		$inst = new equipos();
		$r = $inst->equipos_asignados_nodos($id_nodo);
		echo json_encode($r);	
		break;
	case 'registrar':
		$cedula = $_POST["cedula"];
		$nombrec = $_POST["nombrec"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		$rango = $_POST["rango"];
		$usuh = $_POST["usuarioh"];
		$passh = $_POST["passwordh"];
		$frecuencia = $_POST["frecuencia"];
		$obsrvacion = $_POST["obser"];
		$nodo = $_POST["nodo"];
		$plan = $_POST["plan"];
		$estado = $_POST["estado"];

		if(empty($cedula) or empty($nombrec) or empty($direccion) or empty($telefono) or empty($correo) or empty($nodo) or empty($plan) or empty($estado)){
			echo "1";
		}else{
			$inst = new clientes();
			$r = $inst->registrar_cliente($cedula,$nombrec,$direccion,$telefono,$correo,$rango,$usuh,$passh,$frecuencia,$obsrvacion,$nodo,$plan,$estado);
			switch ($r) {
				case 'exito':
					echo "2";
					break;
				case 'no_exito':
					echo "3";
					break;
				case 'existe':
					echo "4";
					break;
				
			}

		}
		
		
	break;
}
?>