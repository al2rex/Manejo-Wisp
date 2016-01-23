<?php
require_once("../models/usuarios.php");

//print_r($_POST);exit;
$boton = $_POST["boton"];
switch($boton){
	case 'ingresar':
		//print_r($_POST);
		$nick = $_POST["nick"];
		$pass = $_POST["pass"];
		if(empty($nick) or empty($pass)){
			echo "1";
		}else{
			$ins = new usuarios();
			$r = $ins->identificar($nick,$pass);
			//print_r($r);
			switch ($r) {
				case 'no_ingreso':
					echo "2";
					break;
				case 'exito':
					echo "3";
					break;
			}
		}
	break;
	case 'buscar':
		//print_r($_POST);
		$valor = $_POST["valor"];
		$ins = new usuarios();
		$r = $ins->Listar_usuarios($valor);
		echo json_encode($r);
		break;
	case 'registrar':
		//print_r($_POST);
		$nick = $_POST["nick"];
		$pass = $_POST["pass1"];
		$nombrec = $_POST["nombrec"];
		$email = $_POST["correo"];
		$permisos = $_POST["permisos"];
		$estado = $_POST["estado"];
		if(empty($nick) or empty($pass) or empty($nombrec) or empty($email) or empty($permisos) or empty($estado)){
			echo "1";
		}else{
			$ins = new usuarios();
			$r = $ins->registrar_usuario($nick,$pass,$nombrec,$email,$permisos,$estado);
			//print_r($r);
			switch ($r) {
				case 'existe':
					echo "2";
					break;
				case 'exito':
					echo "3";
					break;
				case 'no_exito':
					echo "4";
					break;			
			}
		}
		break;
	case 'cerrar':
		session_start();
		session_destroy();
	break;
}
?>