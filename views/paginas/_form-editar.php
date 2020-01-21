<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD con PHP Puro - MVC - PDO</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- styles -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/starter-template.css">
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">CRUD</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="_inicio.php">Inicio <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>

	<main role="main" class="container">

		<div class="starter-template">
			<h1>CRUD sencillo con PHP - MVC - PDO</h1>
			<hr>
			<div class="col-md-6 offset-3">
				<form class="text-left">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" value="Mark">
						<small id="nombreHelp" class="form-text text-muted">Ingrese el nombre completo del cliente.</small>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="mark@mark.py">
						<small id="emailHelp" class="form-text text-muted">Ingrese el correo electronico del cliente.</small>
					</div>
					<button type="submit" class="btn btn-info">Editar registro</button>
				</form>
			</div>
		</div>

	</main><!-- /.container -->
	<script src="../../assets/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="../../assets/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>
</html>