<!DOCTYPE html PUBLIC 
"-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">
  <meta charset='utf-8'>
<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
o caminho para a página principal do site (sistema), burlando assim a obrigação de 
fazer um login, com isso se ele não estiver feito o login não será criado a session, 
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }
  else{
    $logado = $_SESSION['nome'];
    if($_SESSION['niveldeacesso'] == 2)
     echo "
   <center><h1 style = 'color:white;background-image: linear-gradient(to right, #37a1fe, #185182);' class='h1'>Direção </h1></center>

 <div class='container' style='color:white;width:500px;height:810px;margin-top:60px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;'>
  <div class='illustration' style='background-color: rgba(0,0,0,0);'><center><img src='../assets/img/lcp2.png' style='height: 100px;'></center></div>
  <p class='h1'>Área da administração</p>
    <p class='h6' style=''>Bem vindo $logado</p>
  
      <center>
        <br>
  <div class='form-group'>
    <a href='Usuarios.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Visualizar lista de usuários cadastrados</button></a>
  </div>
  <div class='form-group'>
    <a href='ListaDeSalas.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Visualizar lista de salas cadastradas</button></a>
  </div>
        <div class='form-group'>
    <a href='ListaDeTurmas.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Visualizar todas as turmas</button></a>
  </div>

  <div class='form-group'>
    <a href='ListaDePedidos.php?resposta=Aguardando'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Visualizar todos os pedidos de salas</button></a>
  </div>

  <div class='form-group'>
    <a href='Cadastro.php'><button style='width:466px;background-color: white;color: rgb(108,117,125);' type='button' class='btn btn-primary'>Realizar cadastro de um usuário</button></a>
  </div>
  <div class='form-group'>
    <a href='cadastrosala.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Realizar cadastro de uma sala</button></a>
  </div>
  <div class='form-group'>
    <a href='RealizarPostagem.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Realizar postagem na aba de noticias</button></a>
  </div>
  <div class='form-group'>
    <a href='CaixaDeEntrada.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Caixa de entrada</button></a>
  </div>
  <div class='form-group'>
    <a href='RealizarPedido.php'><button type='button' style='width:466px;background-color: white;color: rgb(108,117,125);' class='btn btn-primary'>Formulário para requisitar uma sala</button></a>
  </div>
  <div class='form-group'>
    <a href='InserirCronograma.php'><button style='width:466px;background-color: white;color: rgb(108,117,125);'  type='button' class='btn btn-primary'>Inserir ou Atualizar Cronograma</button></a>
  </div>

</center>
</div>
   ";
     else{
      if($_SESSION['niveldeacesso'] == 1)
     echo '<h1 style = "color:red;background-color:white;border:solid 2px red;font-family:Arial Black;"><center>Professor</center></h1>

 <div class="container" style="color:red;width:400px;height:580px;margin-top:60px;border:solid 2px red;background: rgb(255,0,0);
background: linear-gradient(0deg, rgba(255,0,0,1) 0%, rgba(231,231,231,1) 35%, rgba(255,255,255,1) 100%);">
  <form method="POST" action="teste.php" style="margin-top:25px;">
  <p class="h1">Área da administração</p>
    Bem vindo <p style="font-family:arial black;"> ' . $logado . ' </p>
  
      <center>
        <br>
        <div class="form-group">
    <a href="ListaDeTurmas.php"><button type="button" style="background-color: white;color: rgb(108,117,125);" class="btn btn-primary">Visualizar todas as turmas</button></a>
  </div>

   <div class="form-group">
    <a href="EditarSeuPerfil.php"><button type="button" style="background-color: white;color: rgb(108,117,125);" class="btn btn-primary">Editar seu perfil</button></a>
  </div>
  

</form>
</center>
</div>

   ';
    }
                                          
  }


  
  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SISTEMA WEB</title>
</head>

<!--
 <div class="container" style="width:400px;height:580px;margin-top:100px;border:solid 10px green;background-color:white;">
  <form method="POST" action="teste.php" style="margin-top:25px;">
  <p class="h1">Área da administração</p>
    <?php
  echo" Bem vindo $logado";
  ?>
      <center>
        <br>
  <div class="form-group">
    <a href="usuarios.php"><button type="button" class="btn btn-primary">Visualizar lista de usuários cadastrados</button></a>
  </div>
  <div class="form-group">
    <a href="salas.php"><button type="button" class="btn btn-primary">Visualizar lista de salas cadastradas</button></a>
  </div>
  <div class="form-group">
    <a href="../testePhpcadastro/indexteste.php"><button type="button" class="btn btn-primary">Realizar cadastro de um usuário</button></a>
  </div>
  <div class="form-group">
    <a href="cadastrosala.php"><button type="button" class="btn btn-primary">Realizar cadastro de uma sala</button></a>
  </div>
  <div class="form-group">
    <a href="fazerpostagem.php"><button type="button" class="btn btn-primary">Realizar postagem na aba de noticias</button></a>
  </div>
   <div class="form-group">
    <button type="button" class="btn btn-primary">Mudar slides da página principal</button>
  </div>
   <div class="form-group">
    <a href="editarusuario.php"><button type="button" class="btn btn-primary">Editar seu perfil</button></a>
  </div>
  

</form>
</center>
</div>
-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>