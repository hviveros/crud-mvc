<?php

require_once 'models/ClienteModel.php';

class ClienteController {

	#estableciendo las vistas
	public function inicio() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/inicio.php');
        require_once('./views/includes/pie.php');
	}

	public function insertar() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/insertar.php');
        require_once('./views/includes/pie.php');
	}

	public function editar() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/editar.php');
        require_once('./views/includes/pie.php');
	}

	public function eliminar() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/eliminar.php');
        require_once('./views/includes/pie.php');
	}

	public function insertarCliente($datos) {
		$errores = '';
		if (!isset($datos['nombre'])) {
			$errores .= '<p>Falta el nombre</p>';
		} else if (!isset($datos['email'])) {
			$errores .= '<p>Falta el correo</p>';
		} else {
			$errores = '';
		}

		$cliente = new Cliente();
		$cliente->insertarCliente($datos);
	}

	public function editarClientes() {
		#code
	}

	public function eliminarClientes() {
		#code
	}

	public function obtenerClientes() {
		$clientes = new Cliente();
		return $clientes->obtenerClientes();
	}

	public function obtenerIdCliente($id) {
		$clientes = new Cliente();
		$id = $clientes->obtenerIdCliente($id);
		foreach ($id as $r){
			return $r['id'];
		}		 
	}



}