<?php
include_once("Painel/testeclasse.php");
include_once("Painel/bd.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
if(!is_null($nome) & !is_null($senha)){
$usuario = new user($nome,$senha,'0');
logar($usuario);
}


else{}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EI CP2 | TJK II</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Page-Loader.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/slider-with-popup.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:#37a1fe;">
    <div style="background-color:#37a1fe;" class="login-clean">
        <form method="post" action="" style="box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="background-color: rgba(0,0,0,0);"><img src="assets/img/lcp2.png" style="height: 100px;"></div>
            <div class="form-group"><input class="form-control" type="user" name="nome" placeholder="Nome de Usuário"></div>
            <div class="form-group"><input class="form-control" type="password" name="senha" placeholder="Senha"></div>
            <div class="form-group"><button class="btn btn-secondary btn-block" type="submit" style="background-color: white;color: rgb(108,117,125);">Logar</button><a class="btn btn-secondary btn-block" role="button" href="index.html" style="background-color: white;color: rgb(108,117,125);">Voltar</a></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Page-Loader.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>