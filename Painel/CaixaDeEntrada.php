<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>
   <!DOCTYPE html>
   <html>
   <head>
     <title>Caixa de entrada</title>
   </head>
   <body>
  
<center>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">

  <table class="table" style="width:600px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;">
  <thead style="">

    <tr style="color:white;text-align:center;">
      <th scope="col">ID</th>
      <th scope="col">Autor</th>
      <th scope="col">Mensagem</th>
    </tr>
  </thead>
   <tbody>
  <script type="text/javascript">
    function Escrever(){window.open('NovoEmail.php','_self');}

  </script>
    <?php
    $usuario = $_SESSION['nome'];
    $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
    ("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
   $cmd = "SELECT * FROM mensagem WHERE Destinatario='$usuario' ORDER BY ID_Mensagem ASC;";
   $seleciona = mysqli_query($conexao, $cmd);
   $conta = mysqli_num_rows($seleciona);
   
   
 $cont = 0;
   echo "
   <div style='color:white;background-image: linear-gradient(to right, #37a1fe, #185182);'>
   <h1 style = 'text-align:left;font-size:50px;'><img src='../assets/img/lcp2.png' style='height: 80px;'>Caixa de entrada: $usuario
   </h1>

  </div>
   ";
   if($conta <= 0)
   {
    echo "<p class='h6'>NÃO EXISTEM MENSAGENS CADASTRADAS NO SEU BANCO DE DADOS</p>";

   }
  
   else{
    while($row = mysqli_fetch_array($seleciona)){{
    $Numero = $row['ID_Mensagem'];
    $texto = $row['Texto'];
    $Autor = $row['Autor'];
    $cont = $cont + 1;
    
    echo "
      <script type='text/javascript'>
      function abrir$cont(){
        window.open('VisualizarEmail.php?Texto=$texto&Autor=$Autor&Numero=$Numero','_self');
      }

    </script>
    <tr style='color:rgb(108,117,125);background-image: linear-gradient(to right, white, #C8D3D5);font-size:25px;text-align:center;' onclick='abrir$cont()'>
      
      <td><p class='h6'>$Numero</p></td>
      <td><p class='h6'>$Autor</p></td>
      <td><center><p style='max-width: 300px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap' class='h6'>$texto</p></td>


    </tr>
    ";
}

}
}
 ?>
 
   </tbody>
   <div style='float:left; position:absolute;'>
<a style='text-decoration: none;' href=''>
<p class='h5' style='color:white;'>
<img src='../assets/img/+.png' height='30' style='border: 2px solid cyan; border-radius: 50%;'/>
Escrever um novo email 
</p>
</a>
</div>
   </body>
   </html>