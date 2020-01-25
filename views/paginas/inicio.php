<?php

    require_once 'controllers/ClienteController.php';
    $cliente = new ClienteController();
    $clientes = $cliente->obtenerClientes();

?>

	<main role="main" class="container">

		<div class="starter-template">
			<h1>CRUD sencillo con PHP - MVC - PDO</h1>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#id</th>
						<th scope="col">nombre</th>
						<th scope="col">e-mail</th>
						<th scope="col">acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if (!empty($clientes)) {
							foreach ($clientes as $r) { 
					?>
						<tr>
							<th scope="row"><?=$r['id'];?></th>
							<td><?=$r['nombre'];?></td>
							<td><?=$r['email'];?></td>
							<td>
								<a href="?page=editar&id=<?= $r['id']; ?>" type="a" class="btn btn-info">Editar</a>
								<a href="?page=eliminar&id=<?= $r['id']; ?>" type="a" class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
					<?php } } ?>
				</tbody>
			</table>
			<div class="text-left">
				<a href="?page=insertar" class="btn btn-primary text-left">Insertar registro</a>				
			</div>
		</div>

	</main><!-- /.container -->
