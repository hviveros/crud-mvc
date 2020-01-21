    <?php
    require_once 'controllers/BlogController.php';
    $blog = new BlogController();
    $categorias = $blog->obtenerCategorias();
    session_start();

    if (isset($_POST['buscador'])) {
        header('Location: index.php?page=buscar&cadena='.$_POST['cadena']);
        die();
    }

    if (isset($_POST['salir'])) {
        require_once 'controllers/UsuarioController.php';
        $salir = new UsuarioController();
        $cerrar_sesion = $salir->cerrarSesion();
    }
    ?>

    <nav class="nav navbar navbar-expand-lg d-lg-flex flex-lg-column align-items-lg-start">
        <div class="container-fluid d-flex justify-content-end display-lg-none">
            <?php
                if (isset($_SESSION['id_usuario'])) { ?>
                    <form action="" method="POST">
                        <button class="btn btn-sm gray-opacity" name="salir" id="salir">Cerrar sesión</button>
                    </form>
            <?php } else { ?>
                    <a class="gray-opacity" href="index.php?page=login">Iniciar sesión</a>
                    <a class="gray-opacity margin-left-20" href="index.php?page=registro">Registro</a>
            <?php } ?>
            <a class="gray-opacity margin-left-20" target="_blank" href="https://wa.me/5213316923799?text=Hola, ¿me puedes ayudar?">Envíame un mensaje</a>
            <a class="gray-opacity margin-left-20" href="index.php?page=blog&lang=es">ES</a>
            <a class="gray-opacity margin-left-20" href="index.php?page=blog&lang=en">EN</a>
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
        <section class="row d-flex justify-content-between container__news">
            <div class="col-12 col-xl-7 news p-0">
                <div class="d-xl-flex">
                    <?php
                    $principal = $blog->mostrarArticulos('p', 1);
                    if (!empty($principal)) {
                        foreach ($principal as $r) {
                            if ($r['portada']) { ?>
                                <div class="news__image__contain">
                                    <img class="news--image" src="portadas/<?=$r['portada'];?>" alt="notice">
                                </div>
                            <?php } ?>
                            <div class="news__description">
                                <h1 class="blog--title">
                                    <a href="index.php?page=articulo&slug=<?=$r['slug'];?>"><?=$r['titulo'];?></a>
                                </h1>
                                <p class="text-justify"><?=$r['resumen'];?></p>
                            </div>
                        <?php } } ?>
                    </div>
                </div>
                <div class="col-12 col-xl-4 relevant">
                    <div class="relevant__head d-flex justify-content-between mb-4">
                        <h2 class="h4 relevant--title">RELEVANTES</h2>
                        <div class="container__arrows">
                            <span class="arrow--left mr-5">
                                <i class="fas fa-angle-left"></i>
                            </span>
                            <span class="arrow--right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </div>
                    </div>

                    <div class="relevant__body">
                        <?php
                        $relevantes = $blog->mostrarArticulos('r', 2);
                        if (!empty($relevantes)) {
                            foreach ($relevantes as $r) { ?>
                                <article class=" mb-5">
                                    <span class="relevant__article--category">
                                        <?=strtoupper($r['categoria']);?>
                                    </span>
                                    <h6 class="relevant__article--title">
                                        <a href="index.php?page=articulo&slug=<?=$r['slug'];?>"><?=$r['titulo'];?></a>
                                    </h6>
                                    <p class="relevant__article--p"><?=$r['resumen'];?></p>
                                    <em class="relevant__article--public">Publicador por <?=$r['apodo'];?></em>
                                </article>
                            <?php }
                        } ?>
                    </div>
                </div>

            </section>

            <section class="row d-flex justify-content-between">
                <div class="col-12 col-xl-8">
                    <!-- Buscador -->
                    <form action="" method="POST" name="buscarForm" id="buscarForm">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control form-control-sm" id="cadena" name="cadena" placeholder="Buscar...">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" id="buscador" name="buscador" class="btn btn-sm btn-primary mb-2">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix">&nbsp;</div>
                    <!-- End Buscador -->
                    <h2 class="h4 mb-5">ÚLTIMAS PUBLICACIONES</h2>
                    <?php
                    $ultimos = $blog->mostrarArticulos('', 10);
                    if (!empty($ultimos)) {
                        foreach ($ultimos as $r) { ?>
                            <div class="post">
                                <?php if ($r['portada']) { ?>
                                    <div class="post__img__contain">
                                        <img class="post--img" src="portadas/<?=$r['portada'];?>" alt="">
                                    </div>
                                <?php } ?>
                                <div class="post__description">
                                    <h6 class="h4 post__description--title">
                                        <a href="index.php?page=articulo&slug=<?=$r['slug'];?>">
                                            <?=$r['titulo'];?>
                                        </a>
                                    </h6>
                                    <p class="text-justify post__description--p"><?=$r['resumen'];?></p>
                                    <em class="post__description--em">Publicador por: <strong><?=$r['apodo']; ?></strong></em>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>

                <aside class="sidebar col-12 col-xl-3 d-lg-flex flex-xl-column">
                    <div class="widget__videos text-center">
                        <a href=""><img src="https://img.youtube.com/vi/3rEWfnioZzs/hqdefault.jpg" alt="video"></a>
                    </div>
                    <div class="widget__twitter text-center" style="overflow: scroll;">
                        <?php require_once 'views/widgets/timelineTwitter.php'; ?>
                    </div>
                    <div class="widget__mapa text-center">
                        <?php require_once 'views/widgets/mapa.php'; ?>
                    </div>
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
                            <li>
                                <a href="#">Inicio</a>
                            </li>
                            <li class="m-2">
                                <a href="#">Contacto</a>
                            </li>
                            <li>
                                <a href="#">Acerca de</a>
                            </li>
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