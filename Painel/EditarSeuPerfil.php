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
</head>
<body>
  <?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
$logado = $_SESSION['nome'];

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }
else{
  $cmd3 = "SELECT * FROM User WHERE Nome = '$logado'";
  $selec = mysqli_query($conexao, $cmd3);
  $conta = mysqli_num_rows($selec);

   if ($conta <= 0) {
    header('location: Logar.php');
    }
   
   else{
}
}








   $nomeX = $logado;
   $cmd = "SELECT * FROM USER WHERE Nome = '$nomeX'";
   $seleciona = mysqli_query($conexao,$cmd);
   $roda = mysqli_fetch_array($seleciona);
   $senhaX = $roda['Senha'];
   $nivelX = $roda['NivelDeAcesso'];
   echo "<h1 style='background-color:white;color:red;font-size:70px;font-family:Arial Black;'><center>Você está editando: $nomeX // $senhaX // $nivelX </br></center></h1>";


$nomeI = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$senhaI = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$nivelI = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
if(empty($nomeI) & empty($senhaI)  & empty($nivelI)){echo "<h1 style='color:red;background-color:white;font-size:80x;'>OS CAMPOS NÃO FORAM PREENCHIDOS CORRETAMENTE</h1>";}
else{
 /*Chamar função para edição*/
   
   $antigaS =  $senhaX;
   $antigoNV = $nivelX;
   $antigoN = $nomeX;
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


  
?>


<div style="color:red;width:400px;height:350px;margin-top:60px;border:solid 2px red;background: rgb(255,0,0);
background: linear-gradient(0deg, rgba(255,0,0,1) 0%, rgba(231,231,231,1) 35%, rgba(255,255,255,1) 100%);" class="container">
  <p class="h1">Editar seu perfil</p>
<form action="" method="POST" enctype="multipart/form-data">
<p><input type="text" class="form-control" name="nome" id="nome" value="" placeholder="Nome" class="form form-control"
/></p>
<p><input type="text" class="form-control" name="senha" id="senha" value="" placeholder="Senha" class="form form-control"
/></p>
<p><input type="text" class="form-control" name="nivel" id="nivel" value="" placeholder="Nivel" class="form form-control"
/></p>


<p><input style="background-color:red;" class="btn btn-primary" type="submit" value="Alterar dados"/></p>
<input type="hidden" name="alterar" value="change">
</form>


</div>

</div>
<script type="text/javascript">
  function abrir(){
    window.Open(index.php);
  }
</script>
</body>
</html>
