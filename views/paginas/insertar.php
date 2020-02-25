<?php 

require_once 'controllers/ClienteController.php';
$objeto = new ClienteController();

if (isset($_POST['btnInsertar'])) {
	$datos = array(
		'nombre'   => $_POST['nombre'],
		'email'    => $_POST['email'],
	);
	$objeto->insertarCliente($datos);
}

?>

<!-- 	<main role="main" class="container">

		<div class="starter-template">
			<h1>CRUD sencillo con PHP + AJAX</h1>
			<hr>
			<div class="col-md-6 offset-3">
				<form action="index.php?page=insertar" method="POST" name="registroForm" id="registroForm" class="text-left">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" id="nombre" name="nombre" class="form-control" aria-describedby="nombreHelp">
						<small id="nombreHelp" class="form-text text-muted">Ingrese el nombre completo del cliente.</small>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp">
						<small id="emailHelp" class="form-text text-muted">Ingrese el correo electronico del cliente.</small>
					</div>
					<button type="submit" name="insertar" class="btn btn-primary">Guardar registro</button>
				</form>
			</div>
		</div>

	</main> /.container --> 