<?php

require_once 'config.php';
$page = $_GET['page'];

if (!empty($page)) {
	#http://curso-php.test/cms/index.php?page=buscar
	$data = array(
		'dashboard' => array('model' => 'Admin', 'view' => 'dashboard', 'controller' => 'AdminController'),
		'registro' => array('model' => 'Usuario', 'view' => 'registro', 'controller' => 'UsuarioController'),
		'login' => array('model' => 'Usuario', 'view' => 'login', 'controller' => 'UsuarioController'),
		'blog' => array('model' => 'Blog', 'view' => 'index', 'controller' => 'BlogController'),
		'publicar' => array('model' => 'Blog', 'view' => 'publicar', 'controller' => 'BlogController'), #Crear un artículo
		'articulo' => array('model' => 'Blog', 'view' => 'leerArticulo', 'controller' => 'BlogController'),#Mostrar la info del art
		'buscar' => array('model' => 'Blog', 'view' => 'resultadoBusqueda', 'controller' => 'BlogController'), #Encargado de buscar
		'salir' => array('model' => 'Blog', 'view' => 'index', 'controller' => 'UsuarioController'), #Encargado de cerrar sesion
	);

	foreach($data as $key => $components) {
		if ($page == $key) {
			$model = $components['model'];
			$view = $components['view'];
			$controller = $components['controller'];
			break;
		}
	}

	if (isset($model)) {
		require_once 'controllers/'.$controller.'.php';
		$objeto = new $controller();
		$objeto->$view();
	}
} else {
	header('Location: index.php?page=blog');
}