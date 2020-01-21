<?php

require_once 'models/Blog.php';

class BlogController {

	public function index() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/paginas/blog.php');
        require_once('./views/includes/pie.php');
	}

	public function publicar() {
		session_start();
		if ($_SESSION['id_rol'] != 1) {
			header('Location: index.php?page=login');
            die();
		} else {
			require_once('./views/includes/cabecera.php');
    		require_once('./views/admin/publicar.php');
    		require_once('./views/includes/pie.php');
		}
	}

	public function obtenerCategorias() {
		$categorias = new Blog();
		return $categorias->obtenerCategorias();
	}

	public function validarImagen($portada) {
		$directorio = 'portadas/'; #Directorio en dónde guardamos la imagen
		$archivo = $directorio.basename($portada['name']);

		#pathinfo — Devuelve información acerca de la ruta de un fichero
		$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

		$validar = getimagesize($portada['tmp_name']); #Tamalo de una imagen
		if ($validar !== false) {

			#Tamaño en bytes - Dividir 1024 por kb
			#15,000 bytes = 15kb
			if ($portada['size'] > 500000) {
				$respuesta['mensaje'] = "El archivo es muy grande";
				$respuesta['codigo'] = 400;
				return json_encode($respuesta, JSON_PRETTY_PRINT);
			}

			#Validar formato
			if($tipoArchivo != "jpg" && $tipoArchivo != "png" && $tipoArchivo != "gif" && $tipoArchivo != "jpeg") {
    		$respuesta['mensaje'] = "El archivo no tiene un formato válido";
				$respuesta['codigo'] = 400;
				return json_encode($respuesta, JSON_PRETTY_PRINT);
			}

			if (file_exists($archivo)) {
				$respuesta['mensaje'] = "El archivo ya existe";
				$respuesta['codigo'] = 400;
			} else {
				$respuesta['mensaje'] = "Es una imagen de tipo ".$validar['mime'];
				$respuesta['codigo'] = 200;
			}
		} else {
			$respuesta['mensaje'] = "No es una imagen";
			$respuesta['codigo'] = 400;
		}
		return json_encode($respuesta, JSON_PRETTY_PRINT);
	}

	public function guardarPublicacion($datos) {

		$directorio = 'portadas/'; #Directorio donde guardamos las imagenes
		$portada = $datos['portada'];
		$archivo = $directorio.basename($portada['name']);

		date_default_timezone_set('UTC');
		$articulo = new Blog();
		$datos['publicado_por'] = $_SESSION['id_usuario'];
		$datos['fecha_creacion'] = date('Y-m-d');
		$datos['hora_creacion'] = date('h:i:s');
		$datos['slug'] = $this->crearSlug($datos['titulo']); //Mi primer publicacion -> mi-primer-publicacion
		$datos['portada'] = $portada['name'];
		if (move_uploaded_file($portada['tmp_name'], $archivo)) {
			return $articulo->guardarPublicacion($datos);
		}
	}

	public function mostrarArticulos($tipo, $limite) {
		$articulos = new Blog();
		return $articulos->mostrarArticulos('', $limite);
	}

	public function leerArticulo() {
		require_once('./views/includes/cabecera.php');
    	require_once('./views/paginas/leerArticulo.php');
    	require_once('./views/includes/pie.php');
	}

	public function obtenerArticulo($slug) {
		$articulos = new Blog();
		return $articulos->obtenerArticulo($slug);
	}

	public function publicarComentario($datos) {
		$articulo = new Blog();
		//comentario, slug
		$datos['id_usuario'] = $_SESSION['id_usuario'];
		//comentario, slug, id_usuario
		$id_articulo = $this->obtenerIdArticulo($datos['slug']);
		$datos['id_articulo'] = $id_articulo;
		//comentario, slug, id_usuario,id_articulo
		unset($datos['slug']);
		//comentario, id_usuario,id_articulo

		return $articulo->guardarComentario($datos);

	}

	public function obtenerComentarios($slug) {
		$blog = new Blog();
		$id_articulo = $this->obtenerIdArticulo($slug);
		return $blog->obtenerComentarios($id_articulo);
	}

	public function resultadoBusqueda() {
		require_once('./views/includes/cabecera.php');
    	require_once('./views/paginas/resultadoBusqueda.php');
    	require_once('./views/includes/pie.php');
	}

	public function buscarArticulos($cadena) {
		$articulos = new Blog();
		return $articulos->buscarArticulos($cadena, 10);
	}

	private function obtenerIdArticulo($slug) {
		$blog = new Blog();
		$id = $blog->obtenerIdArticulo($slug);
		foreach ($id as $r){
			return $r['id'];
		}
	}

	private function crearSlug($titulo) {
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo);
   	return $slug;
	}


}