<?php

    require('core/request.php');

    session_start();
    if (empty($_SESSION['key'])) {
        $_SESSION['key'] = bin2hex(random_bytes(32));
        #bin2hex = Devuelve una cadena ascii que contiene la representación hexadecimal de un string que va en su parámetro
        #random_bytes(32) = Genera bytes aleatorios seguros. es el tamaño de la cadena
    }

    #Crear CSRF token
    $csrf = hash_hmac('sha256', 'registro.php', $_SESSION['key']);

    if (isset($_POST['registrar'])) {
        if (hash_equals($csrf, $_POST['csrf'])) {
            #hash_equals = compara las cadenas, cifradas empleando al mismo tiempo
            $datos = array(
                'nombre'   => $_POST['nombre'],
                'apodo'    => $_POST['apodo'],
                'email'    => $_POST['email'],
                'password' => md5($_POST['password']), #Agregar después md5
            );
            $objeto->guardarUsuario($datos);
        } else {
            header('Location: error.php');
            die();
        }
    }
?>
<body>
    <div class="container-fluid register-login">
        <div class="row wrapper">
            <div class="col-lg padding-none bg-image-container">
                <div class="container__image">
                    <div class="image--points"></div>
                </div>
            </div>
            <div class="col-lg form-center d-flex justify-content-center align-items-center">
                <div class="container-form">
                    <h1 class="register-login-h1">Registro</h1>
                    <p class="register-login-p">Por favor ingrese sus datos para crear su cuenta</p>
                    <?php
                        if (isset($_SESSION['mensaje'])) {
                            echo "<div class='alert alert-primary' role='alert'>".$_SESSION['mensaje']."</div>";
                        }
                    ?>
                    <form action="index.php?page=registro" method="POST" name="registroForm" id="registroForm">
                        <!-- Agregar después -->
                        <input type="hidden" name="csrf" id="csrf" value="<?php echo $csrf ?>">
                        <!-- Terminado -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    <label for="nombre" class="form-label">Nombre</label>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="form-group">
                                    <input type="text" id="apodo" name="apodo" class="form-control" required>
                                    <label for="apodo" class="form-label">Apodo</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" required>
                                <label for="email" class="form-label">E-mail</label>
                            </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <label for="password" class="form-label">Contraseña</label>
                        </div>
                        <div class="form-group margin--bottom">
                                <input type="password" id="confirmarpass" name="confirmarpass" class="form-control" required>
                                <label for="confirmpassword" class="form-label">Confirmar contraseña</label>
                            </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                <input class="form-check-input checked--form--input" type="checkbox" id="acepto" name="acepto" value="" required>
                                <label class="form-check-label order-2" for="remember">Acepto los términos y condiciones</label>
                                <label class="label--ckecked order-1" for="acepto"></label>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-lg-center">
                            <button type="submit" name="registrar" class="btn btn-signup--register align-self-center">Aceptar</button>
                        </div>
                        <a href="index.php?page=login" class="register-link--haveaccount">¿Ya tiene una contraseña? Entrar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
