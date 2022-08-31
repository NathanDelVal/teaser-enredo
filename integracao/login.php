<?php
session_start();
if (isset($_POST['botao_logar'])) :

    $usuario = isset($_POST['user']) ? trim(strip_tags($_POST['user'])) : FALSE;
    $senha = isset($_POST['senha']) ? trim(strip_tags($_POST['senha'])) : FALSE;

    if ($usuario != FALSE && $senha != FALSE) {

        if ($usuario == 'admin' && $senha == 'IN@abc') {

            $_SESSION['login'] = 'logado';
            header("location:index.php");
        } else {
            $mensagem = 'Informações Invalidas!';
        }
    }
endif;
?>
<!doctype html>
<html class="no-js" lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Integração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- LOGIN -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="">
                    <div class="login-form-head">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                        </div>
                        <h4>Login</h4>
                        <p>Olá, bem vindo ao Integração Internit!</p>
                    </div>

                    <div class="text-center text-danger">
                        <?php if (isset($mensagem)) {
                            echo $mensagem;
                        } ?>
                    </div>

                    <div class="login-form-body">
                        <div class="form-gp">
                            <label>Usuário</label>
                            <input type="text" name="user" required>
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>

                        <div class="form-gp">
                            <label>Senha</label>
                            <input type="password" name="senha" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>

                        <div class="row mb-4 rmber-area"></div>

                        <div class="submit-btn-area">
                            <button type="submit" name="botao_logar">Logar <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIM LOGIN -->

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>