
<head>
<meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <title>EI CP2 | TJK II</title>
    <link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,500,700'>
    <link rel='stylesheet' href='assets/fonts/font-awesome.min.css'>
    <link rel='stylesheet' href='assets/fonts/ionicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Allerta'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lora'>
    <link rel='stylesheet' href='assets/css/Article-Clean.css'>
    <link rel='stylesheet' href='assets/css/Article-List.css'>
    <link rel='stylesheet' href='assets/css/best-carousel-slide.css'>
    <link rel='stylesheet' href='assets/css/Footer-Basic.css'>
    <link rel='stylesheet' href='assets/css/gradient-navbar-1.css'>
    <link rel='stylesheet' href='assets/css/gradient-navbar.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel='stylesheet' href='assets/css/Login-Form-Clean.css'>
    <link rel='stylesheet' href='assets/css/Navigation-with-Button.css'>
    <link rel='stylesheet' href='assets/css/Navigation-with-Search.css'>
    <link rel='stylesheet' href='assets/css/Page-Loader.css'>
    <link rel='stylesheet' href='assets/css/Sidebar-Menu-1.css'>
    <link rel='stylesheet' href='assets/css/Sidebar-Menu.css'>
    <link rel='stylesheet' href='assets/css/slider-with-popup.css'>
    <link rel='stylesheet' href='assets/css/styles.css'>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Page-Loader.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
    <nav class='navbar navbar-dark navbar-expand-md' id='app-navbar' style='background-image: linear-gradient(to right, #37a1fe, #185182);background-position: center;background-repeat: no-repeat; background-size: cover;height:74px;'>
        <div class='container-fluid'><a class='navbar-brand' style='color: #ffffff;font-family: Allerta, sans-serif;font-size: 32px;' href='index.html'><img src='assets/img/lcp2.png' style='width: 75px;'>CP2|TJK II</a><a class='navbar-brand' href='#'></a><button data-toggle='collapse'
                class='navbar-toggler' data-target='#navcol-1'><span class='sr-only'>Toggle navigation</span><span class='navbar-toggler-icon'></span></button>
            <div class='collapse navbar-collapse d-xl-flex justify-content-xl-start' id='navcol-1'>
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
                <li style='' id='drop' class='dropdown' style='padding-right: 0;margin-right: 49px;'><a class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false' href='#' style='color: #ffffff;'>Escola</a>
                    <div class='dropdown-menu' role='menu'><a class='dropdown-item' role='presentation' href='Cronograma.php'>Cronograma<br></a><a class='dropdown-item' role='presentation' href='SalasDisponiveis.php'>Salas disponíveis</a><a class='dropdown-item' role='presentation'
                            href='Avisos%20e%20Eventos.php'>Avisos e Eventos</a><a class='dropdown-item' role='presentation' href='Turmas.html'>Minha Turma</a><a class='dropdown-item' role='presentation' href='Login.php'>Área da Administração</a><a class='dropdown-item'
                            role='presentation' href='MateriaisDidaticos.html'>Materiais didáticos</a></div>
                </li>
                <ul class='nav navbar-nav ml-auto'>
                    <li class='nav-item' role='presentation'></li>
                </ul>
            </div>
        </div>
    </nav>

    <style type="text/css">
    #textoT{font-family:Arial;color:black;font-size:25px;}
    #cabecalho{width:1000px;height:150px;background-color:purple; display: -webkit-flex; display: flex; -webkit-align-items: center; align-items: center; -webkit-justify-content: center; justify-content: center;color:white;}
    #conteudo{width:1000px;height:100%;background-color:blue;}
    #postagens{width:700px;height:100%;
align-items: center; background-color:yellow;position:relative;right:147px;}
    #sidebar{width:300px;height:100%;height:300px;background-color:yellow;position:absolute;left:350px;}

</style>
  </head>

<?php
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
    ("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
    $codigo = $_POST['codigoturma'];
   $cmd = "SELECT * FROM turma WHERE Codigo='$codigo'";
   $seleciona = mysqli_query($conexao, $cmd);
   $conta = mysqli_num_rows($seleciona);
 $cont = 0;
   if($conta > 0)
   {
    
    $row = mysqli_fetch_array($seleciona);
    $Numero = $row['Numero'];
    $cmdpost = "SELECT * FROM postagemturma WHERE Turma = '$Numero' ORDER BY ID DESC";
    $selecionaposts = mysqli_query($conexao,$cmdpost);
    echo "
    <body>
<center>
<div id='cabecalho'>
    <p class='h1'>Turma $Numero</p>

</div>

<div id='conteudo'>

<div id='postagens'>





    ";
    foreach ($selecionaposts as $row2) :
echo '
<div id="postagem">
 <div class="card">
  <div style="background-image: linear-gradient(to right, #0087ea, #37a1fe, #0087ea);" class="card-header">
    <p style="color:white;" id="textoT">'.$row2['Postador'].'  > '.$row2['Disciplina'].'  >   '.$row2['Tipo'].'</p>
  </div>
  <div style="background-color:#ddf0ff;" class="card-body">
    <blockquote class="blockquote mb-0">
    <p style="font-size:25px">'.$row2['Texto'].'</p>
      <a href="" style="text-decoration:none;color:blue;font-size:20px;" target="_blank">Arquivo.extensao</a>
    </blockquote>
    </br>
    <p>'.$row2['Data'].'</p>
  </div>
 </div>
</div>
<hr/>

';
 endforeach;
 echo"
</div>
</div>
</center>
</body>
";
   }
   else{
    header('location:Turmas.html');
    $_SESSION['MSGerro'] = "Erro";
    
   }




?>