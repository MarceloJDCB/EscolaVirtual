<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>
<?php
$Sala = $_GET['Numero'];
$ID = 0; 
   if(Isset($_POST['btn'])){
    $logado = $_SESSION['nome'];
    
    $Autor = $_SESSION['nome'];
    $Texto = $_POST['texto'];
    
         $Status = 'Aguardando';
         $novopedido = new pedido($ID,$Texto,$Status,$Autor,$Sala);
         realizarPedido($novopedido);
       }

    echo"
    <style>
     #t{
     padding-top:10px;
  }
    </style>
    <div class='container' style='width:400px;height:550px;margin-top:50px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;color:white;'>
     <form method='POST' style='' enctype='multipart/form-data'>
     
     <br/>
     <center><p class='h1'>Formulário</p></center>
     <br/>
     <p id='t' class='h4'>Autor: $logado</p>
      <p id='t' name='sala' class='h4'>Sala: $Sala</p>
      <p id='t' class='h4'>Texto:</p>
      <textarea name='texto' rows='10' cols='47' maxlength='255'></textarea>
      <button style='width:350px;text-align:center;background-color: white;color: rgb(108,117,125);' class='btn btn-outline-primary' name='btn'>Enviar</button>
     </form>
   </div>";

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">
	<title>Formulário para requisitar uma sala</title>
</head>
<body>
	

</body>
</html>