<?php
require_once('../models/nodos.php');
$boton = $_POST["boton"];
switch($boton){
	case 'buscar':
	$buscar = $_POST["valor"];
	$inicio = $_POST["inicio"];
	$nroreg = 5;
	$nuevoinicio = ($inicio-1)*$nroreg;
	$inst = new nodos();
	$r = $inst->listar_nodos($buscar);
	$total = count($r);
	$d = $inst->listar_nodos($buscar,$nuevoinicio,$nroreg);
	echo json_encode($d)."*".$total;
	//print_r($_POST);
	break;

	case 'ingresar':
	//print_r($_POST);
	$nombre = $_POST["nombre_nodo"];
	$tipo = $_POST["tipo_nodo"];
	$direccion = $_POST["direccion_nodo"];
	if(empty($nombre) or empty($tipo) or empty($direccion)){
		echo 4;//los campos estan vacios
	}else{
		$inst = new nodos();
		$r = $inst->ingresar_nodos($nombre,$tipo,$direccion);
		switch ($r) {
			case 'exito':
				echo 1;//ingreso exitoso
				break;
			case 'no_exito':
				echo 2;//erro de ingreso
				break;
			case 'existe':
				echo 3;//registro nombre ya existe
				break;
		}
	}
	break;
	case 'actualizar':
	//print_r($_POST);
	$idNodo = $_POST["idNodo"];
	$descripcion = $_POST["descripcion_nodo_act"];
	$direccion = $_POST["direccion_nodo_act"];
	if(empty($descripcion) or empty($direccion)){
		echo 3;
	}else{
		$inst = new nodos();
		$r = $inst->actualizar_nodos($descripcion,$direccion,$idNodo);
		switch ($r) {
			case 'exito':
				echo 1;
				break;
			case 'no_exito':
				echo 2;
				break;
		}
	}

	break;
}

?>