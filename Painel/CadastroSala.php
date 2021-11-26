<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");

?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/CssMae.css">
	<meta charset="utf-8">
	<title>Projeto Teste</title>
</head>
<body>
  <center><h1 class="h1" style="color:white;background-image: linear-gradient(to right, #37a1fe, #185182);text-align:left;font-size:50px;"><img src="../assets/img/lcp2.png" style="height: 80px;">Cadastro de salas</h1></center>
 <div class="container" style="color:white;width:400px;height:250px;margin-top:60px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;">
<form method="POST" style="margin-top:25px;">
	<p class="h1">Registrar nova Sala</p>

  <div class="form-group">
    <label>Número</label>
    <input type="user" class="form-control" name="numero" placeholder="Numero da Sala">
  </div>
  
  <button type="submit" style="background-color: white;color: rgb(108,117,125);width:367px;" class="btn btn-primary">Enviar</button>
  <br>
  <?php
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$disponibilidade = "1";
  if(is_null($numero)){
    echo "<h1 class='h6' style='color:white;'>Preencha todos os campos</h1>";
  }
  else{
  $nvSala = new sala($numero,$disponibilidade);
  cadastrarSala($nvSala);
  
  }
?>
</form>
</div>
</body>
</html>