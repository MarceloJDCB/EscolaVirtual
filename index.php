
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

<body style="background-color:#F2F2F2;">
    <nav class="navbar navbar-dark navbar-expand-md" id="app-navbar" style="background-image: linear-gradient(to right, #37a1fe, #185182);background-position: center;background-repeat: no-repeat; background-size: cover;height:74px;">
        <div class="container-fluid"><a class="navbar-brand" style="color: #ffffff;font-family: Allerta, sans-serif;font-size: 32px;" href="index.html"><img src="assets/img/lcp2.png" style="width: 75px;">CP2|TJK II</a><a class="navbar-brand" href="#"></a><button data-toggle="collapse"
                class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                <li style="" id="drop" class="dropdown" style="padding-right: 0;margin-right: 49px;"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffff;">Escola</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Cronograma.php">Cronograma<br></a><a class="dropdown-item" role="presentation" href="SalasDisponiveis.php">Salas disponíveis</a><a class="dropdown-item" role="presentation"
                            href="Avisos%20e%20Eventos.php">Avisos e Eventos</a><a class="dropdown-item" role="presentation" href="Turmas.html">Minha Turma</a><a class="dropdown-item" role="presentation" href="Login.php">Área da Administração</a><a class="dropdown-item"
                            role="presentation" href="MateriaisDidaticos.html">Materiais didáticos</a></div>
                </li>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="container-fluid" style="width: 1140px;"><small style="color: #004f09;">&nbsp;&nbsp;</small>
        <div class="row">
            <div class="col">
                <section id="carousel">
                    <div class="carousel slide" data-ride="carousel" id="carousel-1">
                        <div class="carousel-inner" role="listbox">
                            
<?php
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
 ("Sem conexão com o servidor");
 mysqli_set_charset($conexao,"utf8");

$cont = 0;
$last = 0;
echo "
   <center>
      Teste
   </center>
";


/*while($cont < 3){
$stat = "SELECT * FROM postagem ORDER BY ID DESC";
$query = mysqli_query($conexao,$stat);
$row = mysqli_fetch_array($query);
$v = $row['ID'];
if($v == $last){$stat = "SELECT * FROM postagem WHERE ID != '$last'"};
$descricao = $row['Descricao'];
echo '
                              <div class="carousel-item">
                                <div class="jumbotron pulse animated hero-nature carousel-hero" style="background-image: url(data:image/jpeg;base64,' . $row['Imagem'] . ');">
                                    <h1 class="hero-title">'. $row['Titulo'] .'</h1>
                                    <p><a class="btn btn-primary hero-button plat" role="button" href="#">Leia mais</a></p>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <div class="jumbotron pulse animated hero-photography carousel-hero" style="background-image: url(data:image/jpeg;base64,' . $row['Imagem'] . ');">
                                    <h1 class="hero-title">'. $row['Titulo'] .'</</h1>
                                    <p><a class="btn btn-primary hero-button plat" role="button" href="#" style="background-color: #2b89db;">Leia mais</a></p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="jumbotron pulse animated hero-technology carousel-hero" style="background-image: url(data:image/jpeg;base64,' . $row['Imagem'] . ');">
                                    <h1 class="hero-title">'. $row['Titulo'] .'</</h1>
                                    <p><a class="btn btn-primary hero-button plat" role="button" href="#">Leia mais</a></p>
                                </div>
                            </div>
                        ';
                    }*/

?>
                        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
                        <ol
                            class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0"></li>
                            <li data-target="#carousel-1" data-slide-to="1" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="2"></li>
                            </ol>
                    </div>
                </section>
            </div>
        </div>
    </div>



    <div style="background-color:#F2F2F2;" class="article-list">
        <div class="container">
            <div class="intro"></div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="rounded img-fluid" src="assets/img/desk.jpg"></a>
                    <h3 class="name">Article Title</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a class="action" href="#"><i class="fa fa-arrow-circle-right" style="color: #2b89db;"></i></a></div>
                <div
                    class="col-sm-6 col-md-4 item"><a href="#"><img class="rounded img-fluid" src="assets/img/building.jpg"></a>
                    <h3 class="name" style="color: rgb(0,128,255);">Article Title</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a class="action" href="#"><i class="fa fa-arrow-circle-right" style="color: #2b89db;"></i></a></div>
            <div
                class="col-sm-6 col-md-4 item"><a href="#"><img class="rounded img-fluid" src="assets/img/loft.jpg"></a>
                <h3 class="name">Article Title</h3>
                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a class="action" href="#"><i class="fa fa-arrow-circle-right" style="color: #2b89db;"></i></a></div>
    </div>
    </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#" style="color: rgb(118,237,124);"><i class="icon ion-social-instagram" style="color: #2b89db;"></i></a><a href="#"><i class="icon ion-social-twitter" style="color: #2b89db;"></i></a><a href="#"><i class="icon ion-social-facebook" style="color: #2b89db;"></i></a></div>
            <p
                class="copyright" style="color: #2b89db;">Escola Inteligente - 2019</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Page-Loader.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>