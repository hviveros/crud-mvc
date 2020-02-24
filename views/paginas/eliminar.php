<?php

    require_once 'controllers/ClienteController.php';
    $objeto = new ClienteController();

    /*obtener el valor 'id' de la url para buscar en la bd
    y posteriormente llenar el formulario*/
    if (isset($_GET['id'])) {
	    $idCliente = $_GET['id'];
    	$cliente = $objeto->obtenerCliente($idCliente);
    }

    if (isset($_POST['eliminar'])) {
    	$id = $_POST['id'];
		$objeto->eliminarCliente($id);
    }

?>
	<main role="main" class="container">

		<div class="starter-template">
			<h1>CRUD sencillo con PHP + AJAX</h1>
			<hr>
			<div class="col-md-6 offset-3">
				<form action="index.php?page=eliminar" method="POST" name="eliminarForm" id="eliminarForm" class="text-left">
					<?php
						if (!empty($cliente)) {
							foreach ($cliente as $r) { 
					?>
						<input type="hidden" name="id" value="<?= $r['id']; ?>">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" id="nombre" name="nombre" class="form-control" aria-describedby="nombreHelp" value="<?= $r['nombre']; ?>" disabled>
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" value="<?= $r['email']; ?>" disabled>
						</div>
						<button type="submit" name="eliminar" class="btn btn-danger">Eliminar registro</button>
					<?php } } ?>
				</form>
			</div>
		</div>

	</main><!-- /.container -->
	