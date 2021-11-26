<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>

<?php

if(isset($_POST['btn'])){
  $verifica = $_FILES['myfile']['tmp_name'];
  if(!isset($verifica) || $_POST['data'] == false){
          echo "<h1 style='background-color:fuchsia;color:white;'>Preencha todos os campos</h1>";
         }
  else{
  $datas = $_FILES['myfile']['tmp_name'];
  $pdf = base64_encode(file_get_contents(addslashes($datas)));
  $data = $_POST['data'];

  
  $nvcronograma = new cronograma($data,$pdf);
  inserirCronograma($nvcronograma);
  
             }
         }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cronograma</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/CssMae.css">
</head>
<body>
 
<?php
$today = date("Y");
echo "<center>
<h1 class='h1' style = 'color:white;background-image: linear-gradient(to right, #37a1fe, #185182);text-align:left;font-size:35px;'>
<img src='../assets/img/lcp2.png' style='height: 80px;'/>
Atualizar ou inserir cronograma $today
</h1></center>
";

?>
  <div class="container" style="width:420px;height:400px;margin-top:100px;background-color:red;color:white;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;">
     <form method="POST" action="" enctype="multipart/form-data">
     
     <br/>
     <center><p style="font-size:34px;" class="h4">Inserir cronograma</p></center>
     <p class="h4">Data:<input style="width:385px;" type="text" name="data"/></p>
      
      <br/>
      <p class="h4">Arquivo .pdf:<input style="width:385px;" type="file" class="form form-control" name="myfile"/></p>
      

      <br/>
      
      <button type="button" style="width:385px;background-color: white;color: rgb(108,117,125);" class="btn btn-primary">Postar</button>
      
     </form>
   </div>
</body>
</html>