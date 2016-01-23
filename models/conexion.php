<?php
class conexion
{
	private $servidor;
	private $usuario;
	private $contraseña;
	private $basedatos;
	public  $conexion;

	public function __construct(){
		$this->servidor   = "127.0.0.1";
		$this->usuario	  = "root";
		$this->contraseña = "";
		$this->basedatos  = "manejowisp";

	}

	function conectar(){
		$this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->basedatos","$this->usuario","$this->contraseña");
	}

	function cerrar(){
		$this->conexion->close();
	}
}
?>