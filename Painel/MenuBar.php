<?php
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
  if($nv == 2){echo "
   <script>
     function voltar(){
      window.open('painel.php','_self');
     }
   </script>
<meta charset='utf-8'>
  <h1 class='h1' style='color:rgb(108,117,125);background-image: linear-gradient(to right, white, #C8D3D5);font-size:25px'>
  <input class='btn btn-primary' style='font-family:arial black;background-color: white;color: rgb(108,117,125);' type='button' onclick='voltar()' value='<' />
  <img src='img/user.jpg' width='30' height='30'/>
  Nome: $logado // 
  <img src='img/up.png' width='30' height='30'/> 
  Nivel de acesso: $nivel
  </h1>"

  ;

}
  else{if($nv == 1){echo "
 <script>
     function voltar(){
      window.open('painel.php','_self');
     }
   </script>
<meta charset='utf-8'>
  <h1 class='h1' style='color:gray;background-image: linear-gradient(to right, white, gray);font-size:30px;'>
  <input class='btn btn-primary' style='background-color: white;color: rgb(108,117,125);' type='button' onclick='voltar()' value='<-' />
  <img src='img/icone-cadeado.png' width='30' height='30'/>Recusado // <img src='img/user.jpg' width='30' height='30'/>Nome: $logado // <img src='img/up.png' width='30' height='30'/>Nivel de acesso: $nivel</h1>
  ";}}

}
}


?>