<?php

require_once './models/ClienteModel.php';

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

		$cliente = new ClienteModel();
		$cliente->insertarCliente($datos);

		header('Location: index.php?page=inicio&mensaje=Registro Exitoso');
	}

	public function editarCliente($id, $datos) {

		$cliente = new ClienteModel();		
		$cliente->editarCliente($id, $datos);

		header('Location: index.php?page=inicio&mensaje=Guardado con Éxito');
	}

	public function eliminarCliente($id) {
		$cliente = new ClienteModel();
		$cliente->eliminarCliente($id);

		header('Location: index.php?page=inicio&mensaje=Registro Eliminado');
	}

	public function obtenerClientes() {
		$clientes = new ClienteModel();
		return $clientes->obtenerClientes();
	}

	public function obtenerCliente($id) {
		$cliente = new ClienteModel();
		return $cliente->obtenerCliente($id);
	}



}