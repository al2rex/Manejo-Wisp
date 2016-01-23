<?php
require_once("../models/facturacion.php");

$boton = $_POST["boton"];
switch ($boton) {
	case 'ingresar-fac':
		//print_r($_POST);
		$inicial = $_POST["fecha_ini"];
		$final = $_POST["fecha_fin"];
		if(empty($inicial) or empty($final)){
			echo "1";
		}else{
			$inst = new facturacion();
			$r = $inst->generar_facturas($inicial, $final);
			print_r($r);
		}
		break;
	case 'buscarfacturas':
		$valor = $_POST["valor"];
		$inst = new facturacion();
		$r = $inst->listar_facturas($valor);
		echo json_encode($r);
		//print_r($r);
		break;
}
?>