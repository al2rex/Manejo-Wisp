<?php
require_once("../models/empresa.php");
$boton = $_POST["boton"];

if($boton == "cargar"){
//print_r($_POST);
	$inst = new empresa();
	$r = $inst->empresa();
	echo json_encode($r);
//print_r($r);
}else{
	if($boton == "guardar"){
		//print_r($_POST);
		$id = $_POST["idempresa"];
		$nit = $_POST["nit_act"];
		$nom = $_POST["nombre_act"];
		$dir = $_POST["direccion_act"];
		$tel = $_POST["tel_act"];
		$correo = $_POST["correo_act"];
		$inst = new empresa();
		$r = $inst->registrar_datos_empresa($id, $nit, $nom, $dir, $tel, $correo);
		switch ($r) {
			case 'insert_exito':
				echo "1";
				break;
			case 'insert_no_exito':
				echo "2";
				break;
			case 'update_exito':
				echo "3";
				break;
			case 'update_no_exito':
				echo "4";
				break;
			
		}
	}
}

?>
