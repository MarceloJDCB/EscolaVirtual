<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>
<?php
$urlatual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$textoR = filter_input(INPUT_POST, 'textor', FILTER_SANITIZE_STRING);
if($textoR == ''){}
else{
    if(isset($textoR)){
    $destinatario = $_GET['Destinatario'];
    $msg = new mensagem($logado,$textoR,$destinatario);
    responderEmail($msg);
    echo "<h1 style='background-color:fuchsia;color:white;'>$logado & $textoR & $destinatario</h1>";
    }else{
      if($textoR == ''){
        echo "<h1 style='background-color:white;font-family:arial;'>vazio</h1>";
      }
      else{echo "<h1 style='background-color:white;font-family:arial;'>vazio</h1>";}
    }
  }
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }
  else{
    $logado = $_SESSION['nome'];
    $destinatario = $_GET['Destinatario'];
    $textoR = filter_input(INPUT_POST, 'textor', FILTER_SANITIZE_STRING);
    echo "
    <script>
    function link(){
    }
    </script>
  <div class='container' style='width:400px;height:602px;margin-top:50px;background-color:red;color:white;''>
     <form method='POST' enctype='multipart/form-data'>
     
     <br/>
     <center><p class='h2'>Resposta</p></center>
     <br/>
     <p class='h4'>Autor: $logado</p>
      <br/>
      <p name='Destinatario' class='h4'>Destinatario: $destinatario</p>
      <br/>
      <p class='h4'>Texto:</p>
      <textarea name='textor' rows='10' cols='47' maxlength='255'></textarea>
      <br/>
      <button onclick='link()' style='width:350px;text-align:center;' class='btn btn-outline-primary' name='btn'>Enviar</button>
     </form>
   </div>
   ";
   }

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
	<title>Formulário para responder</title>
</head>
<body>
	

</body>
</html>