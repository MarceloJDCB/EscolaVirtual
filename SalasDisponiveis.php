
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
                            href="Avisos%20e%20Eventos.php">Avisos e Eventos</a><a class="dropdown-item" role="presentation" href="Turmas.html">Minha Turma</a><a class="dropdown-item" role="presentation" href="Login.php">Área da Administração</a><a class="dropdown-item"
                            role="presentation" href="MateriaisDidaticos.html">Materiais didáticos</a></div>
                </li>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div></div>
    <div class="page-content-wrapper">
    <div class="container">    
        <div class="card-group">
    <?php
    $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
    ("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
   $cmd = "SELECT * FROM salas ORDER BY NumeroSala ASC";
   $seleciona = mysqli_query($conexao, $cmd);
   $conta = mysqli_num_rows($seleciona);
 $cont = 0;
   if($conta <= 0)
   {
    echo "<p class='h6'>NÃO EXISTEM SALAS CADASTRADAS NO BANCO DE DADOS</p>";

   }
  
   else{
    while($row = mysqli_fetch_array($seleciona)){{
    $NumeroSala = $row['NumeroSala'];
    $disponibilidade = $row['Disponibilidade'];
    $cont = $cont + 1;
    if($disponibilidade == 1){
    echo "
      <script type='text/javascript'>
      function abrir$cont(){
        window.open('Painel/RealizarPedido.php?Numero=$NumeroSala');
      }

    </script>
    <tr style='background-color:#7997ff;text-align:center;'>
      
     <div class='card'><img class='card-img-top w-100 d-block'>
                    <div class='card-body'>
                        <h4 class='text-left card-title'>Sala: $NumeroSala</h4>
                        <button class='btn btn-primary' onclick='abrir$cont()' type='button' style='width: 100px;'>Disponível</button></div>
                        
                </div>


    </tr>
    ";
}
else if($disponibilidade == 0){
    echo "
      <script type='text/javascript'>
      function abrir$cont(){
        window.open('');
      }

    </script>
    <tr style='background-color:#7997ff;text-align:center;' onclick='abrir$cont()'>
      
     <div class='card'><img class='card-img-top w-100 d-block'>
                    <div class='card-body'>
                        <h4 class='text-left card-title'>Sala: $NumeroSala</h4>
                        <button class='btn btn-primary' type='button' style='width: 100px;' disabled>Ocupada</button></div>
                        
                </div>


    </tr>
    ";
}
}}}?>
</div>
            
                
        
            </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#" style="color: rgb(118,237,124);"><i class="icon ion-social-instagram" style="color: #2b89db;"></i></a><a href="#"><i class="icon ion-social-twitter" style="color: #2b89db;"></i></a><a href="#"><i class="icon ion-social-facebook" style="color: #2b89db;"></i></a></div>
            <p
                class="copyright" style="color: #2b89db;">Escola Inteligente &nbsp;2019</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Page-Loader.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>