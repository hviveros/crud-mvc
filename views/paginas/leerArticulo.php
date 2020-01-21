<?php
require_once 'controllers/BlogController.php';
$blog = new BlogController();
$categorias = $blog->obtenerCategorias();
$slug = $_GET['slug'];
session_start();

if (isset ($_POST['enviar'])) {
    if (!empty($_POST['comentario'])) {
        $datos = array(
            'comentario' => $_POST['comentario'],
            'slug'       => $slug
        );

        $blog->publicarComentario($datos);

    }
}

?>

<nav class="nav navbar navbar-expand-lg d-lg-flex flex-lg-column align-items-lg-start">
    <div class="container-fluid d-flex justify-content-end display-lg-none">
        <a class="gray-opacity" href="index.php?page=login">Iniciar sesión</a>
        <a class="gray-opacity margin-left-20" href="#">Registro</a>
    </div>
    <a class="navbar-brand nav--title" href="#"><?php echo NOMBRE_BLOG; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon d-flex flex-column justify-content-around">
            <div class="bar-nav rounded"></div>
            <div class="bar-nav rounded"></div>
            <div class="bar-nav rounded"></div>
        </span>
    </button>

    <div class="collapse navbar-collapse d-lg-flex justify-content-start" id="navbarSupportedContent">
        <div class="container-fluid d-flex justify-content-start display-lg-block">
            <a class="gray-opacity" href="#">Iniciar sesión</a>
            <a class="gray-opacity margin-left-20" href="#">Registro</a>
        </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link gray-opacity" href="index.php?page=blog">INICIO</a>
            </li>
            <?php
            if (!empty($categorias)) {
                foreach ($categorias as $r) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link gray-opacity' href='#'>".strtoupper($r['categoria'])."</a>";
                    echo "</li>";
                }
            }
            ?>
            <li class="nav-item">
                <a class="nav-link gray-opacity" href="#">CONTACTO</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid blog">
    <div class="blog-space"></section>
        <section class="row d-flex justify-content-between">
            <div class="col-12 col-xl-8">
                <?php
                $articulo = $blog->obtenerArticulo($slug);
                if (!empty($articulo)) {
                    foreach ($articulo as $r) { ?>
                        <h2 class="h4 mb-5">
                            <a href="index.php?page=articulo&slug=<?=$r['slug'];?>">
                                <?=strtoupper($r['titulo']);?>
                            </a>
                        </h2>
                        <div class="post">
                            <div class="post__img__contain">
                                <img class="post--img" src="https://dummyimage.com/300x200/000/adadad.png&text=+" alt="">
                            </div>
                            <div class="post__description">
                                <em class="post__description--em">Publicador por: <strong><?=$r['apodo']; ?></strong></em>
                                <div class="clearfix">&nbsp;</div>
                                <p class="text-justify post__description--p"><?=$r['contenido'];?></p>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="post__description">
                                <hr>
                                <?php
                                if (isset($_SESSION['id_usuario'])) { ?>
                                    <form action="index.php?page=articulo&slug=<?=$slug;?>" method="POST" name="comentarioForm" id="comentarioForm">
                                        <div class="form-group">
                                            <label for="comentario">Escribe tu comentario</label>
                                            <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="enviar" id="enviar" class="btn btn-primary mb-2">Enviar</button>
                                        </div>
                                    </form>
                                <?php } else {
                                    echo "<p>Para comentar debe <a href='index.php?page=registro'><span class='text-primary'>registrarse</span> o <a href='index.php?page=login'><span class='text-primary'>iniciar sesión</span></a></p>";
                                }
                                ?>
                            </div>
                            <div class="blog--comentarios">
                                <p class="blog--titulo-comentarios">Comentarios</p>
                                <?php
                                $comentarios = $blog->obtenerComentarios($slug);
                                if (!empty($comentarios)) {
                                    foreach ($comentarios as $r) { ?>
                                        <div class="blog--comentario">
                                            <span class="badge badge-primary"><?=$r['apodo'];?></span>
                                            <span><?=$r['comentario'];?></span>
                                        </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
                <aside class="sidebar col-12 col-xl-3 d-lg-flex flex-xl-column">
                    <div class="widget__twitter text-center"><p>widget</p></div>
                    <div class="widget__comment text-center"><p>widget</p></div>
                </aside>
            </section>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 mr-50">
                        <span><a href="#">Blog</a></span>
                    </div>

                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <ul class="d-flex flex-column footer--ul">
                            <li><a href="#">Inicio</a></li>
                            <li class="m-2"><a href="#">Contacto</a></li>
                            <li><a href="#">Acerca de</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 d-flex justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end">
                        <span class="social ml-0 ml-sm-4 ml-md-4 ml-lg-4 ml-xl-4" >
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </span>
                        <span class="social ml-4" >
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </span>
                        <span class="social ml-4" >
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </span>
                        <span class="social ml-4" >
                            <a href="#"><i class="fas fa-globe-americas"></i></a>
                        </span>
                    </div>
            </div>
        </div>
    </footer>