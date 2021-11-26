
<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">
  <center><h1 style = "color:white;background-image: linear-gradient(to right, #37a1fe, #185182);text-align:left;font-size:50px;"><img src="../assets/img/lcp2.png" style="height: 80px;">Turmas</h1></center>
<center>
  <div class="container" style="margin-top:10px;color:white;width:500px;height:1000px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;">
    <table class="table">
  <thead>
    <tr style="color:white;">
      <th scope="col">Numero</th>
      <th scope="col">Codigo</th>
    </tr>
  </thead>
   <tbody style="color:white;font-style:italic;">
<?php

 $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");

   $cmd = "SELECT * FROM turma";
   $seleciona = mysqli_query($conexao, $cmd);
   $conta = mysqli_num_rows($seleciona);

  



   if($conta <= 0)
   {
    echo "<h1 class='h3'>Não foram encontradas turmas no banco de dados</h1>";

   }
   else{
    while($row = mysqli_fetch_array($seleciona)){{
    $numero = $row['Numero'];
    $codigo = $row['Codigo'];
    }
    echo "
      <tr>
       <td>$numero</td>
       <td>$codigo</td>
       </tr>
    ";
  }
  }
?>
</tbody>
</table>
</div>
</center>
<!DOCTYPE html>
<html>
<head>
  <title>Turmas</title>
</head>
<body>

</body>
</html>