<!DOCTYPE html>
<html>
<head>

	<title>Editar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">
  <meta charset='utf-8'>
</head>
<body>
	<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }
else{
	$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
  $logado = $_SESSION['nome'];
  $cmd3 = "SELECT * FROM User WHERE Nome = '$logado'";
  $selec = mysqli_query($conexao, $cmd3);
  $conta = mysqli_num_rows($selec);

   if ($conta <= 0) {
    header('location: Logar.php');
    }
   
   else{
  while($row = mysqli_fetch_array($selec)){
    $nome = $row['Nome'];
    $senha = $row['Senha'];
    $nv = $row['NivelDeAcesso'];
    
}
  if($nv == 1){
  $nivel = "Professor";
  }
  else{
    if($nv == 2)
    {
      $nivel = "Direção";
    }
  }
  if($_SESSION['niveldeacesso'] == 2){
  

$N = $_GET['numeroEdit'];
/*listagem*/
   $cmd = "SELECT * FROM User WHERE Nome = '$N'";
   $seleciona = mysqli_query($conexao, $cmd);
   while($conta = mysqli_fetch_array($seleciona)){
   $nomeX = $conta['Nome'];
   $senhaX = $conta['Senha'];
   $nivelX = $conta['NivelDeAcesso'];
     }
   echo "
   <div style='background-image: linear-gradient(to right, #37a1fe, #185182);text-align:left;'>
   
   <h1 style='color:white;font-size:50px;'>
   <img src='../assets/img/lcp2.png' style='height: 80px;'></img>
   Editar Usuario : $nomeX<br/>
   </h1>
  </div>
   ";



echo '
<div style="color:white;width:400px;height:350px;margin-top:60px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;" class="container">
  <p class="h1">Editar seu perfil</p>
<form action="" method="POST" enctype="multipart/form-data">
<p><input type="text" class="form-control" name="nome" id="nome" value="" placeholder="Nome" class="form form-control"
/></p>
<p><input type="text" class="form-control" name="senha" id="senha" value="" placeholder="Senha" class="form form-control"
/></p>
<p><input type="text" class="form-control" name="nivel" id="nivel" value="" placeholder="Nivel" class="form form-control"
/></p>


<p><input style="background-color: white;color: rgb(108,117,125);" class="btn btn-primary" name="btn" type="submit" value="Alterar dados"/></p>
<input type="hidden" name="alterar" value="change">
',
$nomeI = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$senhaI = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$nivelI = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
if(empty($nomeI) || empty($senhaI)  || empty($nivelI)){
  echo "<h1 class='h6' style='color:white;'>Preencha todos os campos.</h1>";
}
else{
 /*Chamar função para edição*/
   
   $antigaS =  $senhaX;
   $antigoNV = $nivelX;
   $antigoN = $_GET['numeroEdit'];
   $_SESSION['AntigoN'] = $antigoN;
   $_SESSION['AntigaS'] = $antigaS;
   $_SESSION['AntigaNiv'] = $antigoNV;
   if ($nivelI > 2 || $nivelI < 0 || !is_numeric($nivelI)){
    echo "<h1 class = 'h1' style='background-color:cyan;color:white;'>Niveis de acesso possíveis: 1 = Professor ou 2 = Direção</h1>";
   }
   else{
   echo "<script language='javascript'> alert('$antigoN // $antigaS // $antigoNV')</script>"  ;
   echo "<script language='javascript'> alert('$nomeI // $senhaI // $nivelI')</script>"  ;
   $usuario = new user($nomeI,$senhaI,$nivelI);
   editarUsuario($usuario);
 }
}
'
</form>


</div>

</div>
';


  }
  else{if($_SESSION['niveldeacesso'] == 1){
    echo "<body style='background-color:#37a1fe'>
        <h1 class='h1' style='
        width: 100vw;height: 80vh;display: flex;flex-direction: row;justify-content: center;align-items: center;
        color:white;'>Você não tem permissões o suficiente para acessar esta página!</h1>

    </body>
    ";

  }}

}
}








	
?>



</body>
</html>
