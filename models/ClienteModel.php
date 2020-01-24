<?php
require_once 'ModeloBase.php';

class Cliente extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerClientes() {
		$db = new ModeloBase();
		$query = "SELECT * FROM cliente ORDER BY id";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerIdCliente($id) {
		$db = new ModeloBase();
		$query = "SELECT id FROM cliente WHERE id = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function insertarCliente($datos) {
		$db = new ModeloBase();
		try {
			$insertar = $db->insertar('cliente', $datos);
			if ($insertar == true) {
				$_SESSION['mensaje'] = 'Cliente registrado';
			}
		} catch (PDOException $e) {
			$_SESSION['mensaje'] = $e->getMessage();
		}
	}

	public function editarCliente($id) {
		#code
	}

	public function eliminarCliente($id) {
		#code
	}

}
