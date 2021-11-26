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

<body>
    <nav class="navbar navbar-dark navbar-expand-md" id="app-navbar" style="background-image: linear-gradient(to right, #37a1fe, #185182);background-position: center;background-repeat: no-repeat; background-size: cover;height:74px;">
        <div class="container-fluid"><a class="navbar-brand" style="color: #ffffff;font-family: Allerta, sans-serif;font-size: 32px;" href="index.html"><img src="assets/img/lcp2.png" style="width: 75px;">CP2|TJK II</a><a class="navbar-brand" href="#"></a><button data-toggle="collapse"
                class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse d-xl-flex justify-content-xl-start" id="navcol-1">
                <div class="collapse navbar-collapse d-xl-flex justify-content-xl-start" id="navcol-1">
                <div class="collapse navbar-collapse d-xl-flex justify-content-xl-start" id="navcol-1">
                <style>
                    #drop{
                    list-style:none;
                    text-decoration:none;
                }
                a:focus{text-decoration:none;}
                a:hover{text-decoration:none;}
                    #drop:hover{
                    list-style:none;
                    text-decoration:none;
                }
                </style>
                <li id="drop" class="dropdown" style="padding-right: 0;margin-right: 49px;"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffff;">Escola</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Cronograma.php">Cronograma<br></a><a class="dropdown-item" role="presentation" href="SalasDisponiveis.php">Salas disponíveis</a><a class="dropdown-item" role="presentation"
                            href="Avisos%20e%20Eventos.html">Avisos e Eventos</a><a class="dropdown-item" role="presentation" href="Turmas.html">Minha Turma</a><a class="dropdown-item" role="presentation" href="Login.php">Área da Administração</a><a class="dropdown-item"
                            role="presentation" href="MateriaisDidaticos.html">Materiais didáticos</a></div>
                </li>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="article-clean">
        <div class="container">
            <div class="row">


                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2" style="background-color:#F3F3F3;">
                    <form>
<div style="" class="form-group">
                    <?php

$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
 ("Sem conexão com o servidor");
 mysqli_set_charset($conexao,"utf8");
$stat = "SELECT * FROM postagem ORDER BY ID DESC;";
$query = mysqli_query($conexao,$stat);
    foreach ($query as $row) :
$descricao = $row['Descricao'];
echo '



<h1 class="text-center" style="color: #004f09;font-family: Allerta, sans-serif;">'. $row['Titulo'] .'</h1>
<p class="text-center">
<span class="by" style="font-family: Allerta, sans-serif;color: #004f09;">Por: </span>
<a href="#" style="color: #00a413;">'. $row['Postador'] .'</a>
<span class="date" style="color: #004f09;">'. $row['Data'] .'</span>
</p>
<center>
<img style="width: 700px;height: 400px;" src="data:image/jpeg;base64,' . $row['Imagem'] . '" />
<br/>

<br />
<p>'. $descricao .'</p>
</center>
<hr/>

';
 endforeach ?>
 </div>
</form>
                    <!--<div class="intro">
                        <h1 class="text-center" style="color: #39de4c;font-family: Allerta, sans-serif;">Um evento</h1>
                        <p class="text-center"><span class="by" style="font-family: Allerta, sans-serif;color: #004f09;">Pela</span> <a href="#" style="color: #00a413;">DireçãO</a><span class="date" style="color: #004f09;">4 de AGOSTO 2019</span></p><img style="width: 730px;height: 486.359px;background-image: url(&quot;assets/img/slide1.png&quot;);background-size: 100%;background-repeat: no-repeat;background-position: center;"></div>
                    <p>Um paragráfo</p>
                    -->

            </div>
        </div>
    </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#" style="color: rgb(118,237,124);"><i class="icon ion-social-instagram" style="color: rgb(97,197,102);"></i></a><a href="#" style="color: rgb(97,197,102);"><i class="icon ion-social-snapchat" style="color: rgb(97,197,102);"></i></a>
                <a
                    href="#"><i class="icon ion-social-twitter" style="color: rgb(97,197,102);"></i></a><a href="#"><i class="icon ion-social-facebook" style="color: rgb(97,197,102);"></i></a></div>
            <p class="copyright" style="color: rgb(97,197,102);">Escola Inteligente © 2019</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Page-Loader.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>