<?php
  require_once 'controllers/BlogController.php';
  $blog = new BlogController();
  $categorias = $blog->obtenerCategorias();

  if (isset($_POST['publicar'])) {
    $respuestaImagen = $blog->validarImagen($_FILES['portada']);
    $validarImagen = json_decode($respuestaImagen, true);
    if ($validarImagen['codigo'] == 200) {
      $datos = array(
        'titulo'       => $_POST['titulo'],
        'id_categoria' => $_POST['id_categoria'],
        'resumen'      => $_POST['resumen'],
        'contenido'    => $_POST['contenido'],
        'tipo'         => $_POST['tipo'],
        'portada'      => $_FILES['portada']
      );
      $blog->guardarPublicacion($datos);
    }
  } else {

  }
?>
<div class="container-fluid dashboard">
  <div class="row">
    <?php require_once 'navbar.php'; ?>
    <div id="main" class="p-0 container-fluid main">
      <header class="pr-3 pl-3 pr-md-3 pl-md-3 pr-lg-5 pl-lg-5 d-flex justify-content-end align-items-center header">
        <div class="w-100 text-sm-left text-md-center">
          <h1 class="m-0 d-lg-none side__nav--title"><?php echo NOMBRE_BLOG; ?></h1>
        </div>
        <div class="btn-group container__user">
          <button type="button" class="p-0 d-flex align-items-center position-relative container__user--btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <p class="m-0 mr-4 username">Usuario</p>
            <span class="arrow--left" ></span>
              <i class="fas fa-angle-down username--arrow" id="dropdownMenuButton"></i>
            </span>
          </button>
        </div>
      </header>
      <div class="p-4 p-lg-5  main__container">
        <div class="row m-0 mb-5"><h2>Publicaciones</h2></div>
          <div class="row">
            <div class="pt-4 col-12 col-xl-12 last__publications">
              <!-- Insertar -->
              <?php
                if (isset($_SESSION['mensaje'])) {
                  echo "<div class='alert alert-primary' role='alert'>".$_SESSION['mensaje']."</div>";
                }
              ?>
              <form action="index.php?page=publicar" method="POST" name="publicarForm" id="publicarForm" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputEmail4">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Categoría</label>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                      <option value="0">Seleccione la categoría</option>
                      <?php
                        if (!empty($categorias)) {
                          foreach ($categorias as $r) {
                            echo "<option value=".$r['id'].">".$r['categoria']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Tipo</label>
                    <select id="tipo" name="tipo" class="form-control">
                      <option value="0">Seleccione el tipo</option>
                      <option value="p">Principal</option>
                      <option value="r">Relevante</option>
                      <option value="n">Normal</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Resumen</label>
                  <input type="text" class="form-control" id="resumen" name="resumen" placeholder="">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Contenido</label>
                  <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Portada</label>
                  <input type="file" class="form-control" id="portada" name="portada">
                </div>
                <button type="submit" name="publicar" id="publicar" class="btn btn-primary">Publicar</button>
              </form>
            </div>
          <!-- Fin Insertar -->
          </div>

          <div class="row">
            <div class="pt-4 col-12 col-xl-12 last__publications">
              <h3 class="table--title">Publicaciones</h3>
              <table class="table">
                <thead class="t-head">
                  <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Resumen</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $articulos = $blog->mostrarArticulos('', 10);
                    if (!empty($articulos)) {
                      foreach ($articulos as $r) {
                        echo "<tr>";
                          echo "<td>".$r['titulo']."</td>";
                          echo "<td>".$r['resumen']."</td>";
                          echo "<td>Editar | Eliminar</td>";
                        echo "</tr>";
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
