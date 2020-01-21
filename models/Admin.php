<?php
require_once 'ModeloBase.php';

class Usuario extends ModeloBase {
	public $nombre;
	public $apodo;
	public $email;
	public $password;

	public function __construct() {
		parent::__construct();
	}

	function getNombre() {
		return $this->nombre;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return $this->password;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function guardarUsuario($datos) {
		$db = new ModeloBase();
		$insertar = $db->insertar('usuarios', $datos);
		if ($insertar == true) {
			$_SESSION['mensaje'] = 'Registro exitoso';
		}
	}

	public function accesoUsuario($apodo, $password) {
		$db = new ModeloBase();
		$query = "SELECT * FROM usuarios WHERE apodo = '".$apodo. "' AND password = '".$password . "'";
		$respuesta = $db->consultar($query);
		if ($respuesta == true) {
			session_start();
			$_SESSION['apodo'] = $apodo;
		}
	}

}
