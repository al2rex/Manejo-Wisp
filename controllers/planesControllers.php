<?php
require_once('../models/planes.php');
$boton = $_POST["boton"];
switch($boton){
	case 'buscar':
		$buscar = $_POST["valor"];
		$inst = new planes();
		$r = $inst->listar_planes($buscar);
		echo json_encode($r);
		break;
	case 'ingresar':
		$nombre = $_POST["nombre_plan"];
		$vb = $_POST["vel_bajada"];
		$tb = $_POST["tipo_bajada"];
		$vs = $_POST["vel_subida"];
		$ts = $_POST["tipo_subida"];
		$precio = $_POST["precio_plan"];
		
		if(empty($nombre) or empty($vb) or empty($tb) or empty($vs) or empty($ts) or empty($precio)){
			echo "1";
		}else{
			$inst = new planes();
			$r = $inst->registrar_planes($nombre,$vb,$tb,$vs,$ts,$precio);
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