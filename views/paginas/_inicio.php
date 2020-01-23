
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">CRUD</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					
				</li>
			</ul>
		</div>
	</nav>

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
					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>@mdo</td>
						<td>
							<button type="button" class="btn btn-info">Editar</button>
							<button type="button" class="btn btn-danger">Eliminar</button>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="text-left">
				<a href="_form-insertar.php" class="btn btn-primary text-left">Insertar registro</a>				
			</div>
		</div>

	</main><!-- /.container -->
