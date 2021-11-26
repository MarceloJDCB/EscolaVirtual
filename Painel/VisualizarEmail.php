

<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>

<style type="text/css">p{word-break: break-all;}</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">
<?php
$urlatual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$autor = $_GET['Autor'];
$texto = $_GET['Texto'];
$numero = $_GET['Numero'];
$_SESSION['respostare'] = '';
$resposta = $_SESSION['respostare'];
if(isset($_GET['excluirEmail'])){
	 $numerox = $_GET['Numero'];
   $cmd2 = "SELECT * FROM mensagem WHERE ID_Mensagem = '$numerox'";
   $sele = mysqli_query($conexao, $cmd2);
   $row2 = mysqli_fetch_array($sele);
    $Autor = $row2['Autor'];
    $Texto = $row2['Texto'];
    $Destinatario = $row['Destinatario'];
    $email = new mensagem($Autor,$Texto,$Destinatario);
   excluirEmail($email);
}
echo "
 <script type='text/javascript'>
      function abrirR(){
        window.open('Responder.php?Destinatario=$autor&Texto=$texto&Numero=$numero','_self');
      }
      
      </script>
<div style='background-color:white;' class = 'container'>
<center>
<br/>
<p class='h1'>Autor: $autor</p>
<br/>
<p style='' class='h5'>Mensagem:</p>
<div style='background-color:#007bff;width:600px;'>
<p style='color:white;' class='h5'>$texto</p>
</div>
<br/>
<button style='width:350px;text-align:center;' class='btn btn-outline-primary' onclick='abrirR()' name='btn'>Responder</button>
<a href='$urlatual&excluirEmail=1'><button style='width:350px;text-align:center;' class='btn btn-outline-danger' name='btn'>Apagar</button></a>
$resposta
</center>
<br></br>
</div>

";


?>