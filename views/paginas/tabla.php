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