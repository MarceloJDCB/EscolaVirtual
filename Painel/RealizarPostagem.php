<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>

<?php

if(isset($_POST['btn'])){
  if(getimagesize($_FILES['myfile']['tmp_name']) == false || $_POST['titulo'] == false || $_POST['descricao'] == false){
          echo "<h1 style='background-color:fuchsia;color:white;'>Preencha todos os campos</h1>";
         }
  else{
  $datas = $_FILES['myfile']['tmp_name'];
  $data = base64_encode(file_get_contents(addslashes($datas)));
  $postador = $_SESSION['nome'];
  $descricao = $_POST['descricao'];
  $titulo = $_POST['titulo'];
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  $dataA = date('d/m/y H:i');
  $nvpost = new postagemNormal($titulo,$descricao,$data,$dataA,$postador);
  postar($nvpost);
             }
         }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Blob file</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/CssMae.css">
</head>
<body>
  <div class="container" style="width:400px;height:602px;margin-top:100px;background-color:red;color:white;">
     <form method="POST" action="" enctype="multipart/form-data">
     
     <br/>
     <p class="h4">Realizar uma postagem na aba Avisos e Notícias</p>
     <p class="h4">Titulo:<input type="text" name="titulo"/></p>
      
      <br/>
      <p class="h4">Imagem:<input type="file" class="form form-control" name="myfile"/></p>
      

      <br/>
      <p class="h4">Descrição:</p>
      <textarea name="descricao" rows="10" cols="47" maxlength="255"></textarea>
      <br/>
      <button style="width:350px;text-align:center;" class="btn btn-outline-primary" name="btn">Postar</button>
      
     </form>
   </div>
</body>
</html>