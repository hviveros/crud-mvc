<?php

require_once 'models/usuario.php';

class UsuarioController {

	public function login() {
		session_start();
	    session_destroy();
	    require_once('./views/includes/cabecera.php');
	    require_once('./views/paginas/login.php');
	    require_once('./views/includes/pie.php');
	}

	public function registro() {
	    require_once('./views/includes/cabecera.php');
	    require_once('./views/paginas/registro.php');
	    require_once('./views/includes/pie.php');
	}

	public function guardarUsuario($datos) {
		$errores = '';
		$datos['id_rol'] = 1;
		if (!isset($datos['nombre'])) {
			$errores .= '<p>Falta el nombre</p>';
		} else if (!isset($datos['apodo'])) {
			$errores .= '<p>Falta el apodo</p>';
		} else if (!isset($datos['email'])) {
			$errores .= '<p>Falta el correo</p>';
		} else {
			$errores = '';
		}

		$usuario = new Usuario();
		$usuario->guardarUsuario($datos);
		session_destroy();
	}

	public function accesoUsuario($datos) {
		session_start();
		$usuario = new Usuario();
		$respuesta = $usuario->accesoUsuario($datos['apodo'], $datos['password']);
		if ($respuesta != false) {
			foreach ($respuesta as $r) {
				$_SESSION['id_usuario'] = $r['id'];
				$_SESSION['id_rol'] = $r['id_rol'];
			}
			if ($_SESSION['id_rol'] == 1) {
				header('Location: index.php?page=dashboard');
        die();
			} else {
				header('Location: index.php?page=blog');
        die();
			}
		}
	}

	public function cerrarSesion() {
		session_start();
		session_destroy();
		header('Location: index.php?page=blog');
	}


}