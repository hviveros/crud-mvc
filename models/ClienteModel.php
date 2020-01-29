<?php
require_once 'ModeloBase.php';

class ClienteModel extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerClientes() {
		$db = new ModeloBase();
		$query = "SELECT * FROM cliente ORDER BY id";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerCliente($id) {
		$db = new ModeloBase();
		$query = "SELECT * FROM cliente WHERE id = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function insertarCliente($datos) {
		$db = new ModeloBase();
		try {
			$insertar = $db->insertar('cliente', $datos);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function editarCliente($id, $datos) {
		$db = new ModeloBase();
		try {
			$editar = $db->editar('cliente', $id, $datos);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function eliminarCliente($id) {
		$db = new ModeloBase();
		try {
			$eliminar = $db->eliminar('cliente', $id);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}
