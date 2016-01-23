<?php
require_once("../models/equipos.php");
$boton = $_POST["boton"];
switch($boton){
	case 'buscar':
	$inicio = $_POST["inicio"];
	$nroreg = 5;
	$nuevoinicio = ($inicio-1)*$nroreg;
	$valor = $_POST["valor"];
	$ints = new equipos();
	$r = $ints->listar_equipo($valor);
	$total = count($r);
	$d = $ints->listar_equipo($valor,$nuevoinicio,$nroreg);
	//print_r($r);

	echo json_encode($d)."*".$total;

	
	//print_r($r);
	break;

	case 'registrar':
	//print_r($_POST);
	$nombre = $_POST["nombre_antena"];
	$tipo = $_POST["tipo_antena"];
	$marca = $_POST["marca_antena"];
	$serial = $_POST["serial_antena"];
	$mac = $_POST["mac_antena"];
	
	if(empty($nombre) or empty($tipo) or empty($marca) or empty($serial) or empty($mac)){
		echo "4";
	}else{
		$inst = new equipos();
		$r = $inst->registrar_equipo($nombre,$tipo,$marca,$serial,$mac);
		//print_r($r);
		switch($r){
			case 'exito':
				echo "1";
			break;
			case 'no_exito':
				echo "2";
			break;
			case 'repetido':
				echo "3";
			break;
		}
	}
	break;

	case 'actualizar':
			//print_r($_POST);

		$id_antena = $_POST["idAntena_act"];
		$nom = $_POST["nombre_antena_act"];
		$tipo = $_POST["tipo_antena_act"];
		$marca = $_POST["marca_antena_act"];
		$mac = $_POST["mac_antena_act"];
		if(empty($tipo) or empty($marca) or empty($nom) or empty($mac)){
			echo "3";//campos vacios
		}else{
			$inst = new equipos();
			if($r = $inst->actualizar_equipo($nom,$tipo,$marca,$mac,$id_antena)){
				echo "1";//actualizacion exitoso";
			}else{
				echo "2";//no se pudo actualizar";
			}	
		}

		
	break;
}
?>