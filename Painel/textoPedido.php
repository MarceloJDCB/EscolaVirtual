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
$autor = $_GET['Autor'];
$texto = $_GET['Texto'];
$numero = $_GET['Numero'];
$sala = $_GET['Sala'];
$_SESSION['respostarp'] = '';
$urlatual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$status = $_GET['Status'];
if(isset($_GET['Conceder'])){
	$id = $numero;
	$te = $texto;
	$stat = $status;
	$aut = $autor;
	$sal = $sala;
	$novoPedido = new pedido($id,$te,$stat,$aut,$sala);
	aceitarPedido($novoPedido);
}
else{
	if(isset($_GET['Recusar'])){
	$id = $numero;
	$te = $texto;
	$stat = $status;
	$aut = $autor;
	$sal = $sala;
	$novoPedido = new pedido($id,$te,$stat,$aut,$sala);
	recusarPedido($novoPedido);
	}
}
if($status == 'Aguardando'){
echo "
<center>
<div style='width:90%;background-color:white;'>
<h1 style='color:white;width:100%;color:white;background-image: linear-gradient(to right, #37a1fe, #185182);text-align:center;border:solid 1px cyan; font-size:50px;' class = 'h1'>Pedido</h1>
<center>
<p style='text-align:left;' class='h4'><img src='img/user.jpg' width='30' height='30'/>Autor: $autor</p>
<br/>
<div style='background-color:white;border:1px solid gray; width:70%;'>
<br/>
<p class='h1'>Sala: $sala</p>
<p class='h3'>Mensagem: $texto</p>
<br/>
<a href='$urlatual&Conceder=1'><button style='width:350px;text-align:center;' class='btn btn-outline-primary' name='btn'>Conceder</button></a>
<a href='$urlatual&Recusar=1'><button style='width:350px;text-align:center;' class='btn btn-outline-danger' name='btn'>Recusar pedido</button></a>
<br></br>
</div>
<br></br>
</center>
</div>
</center>
";
}else{
    echo "
 
<div class = 'container'>
<center>
<br/>
<p class='h1'>Autor: $autor</p>
<br/>

<p class='h5'>Mensagem:</p>
<p class='h5'>$texto</p>
<br/>
<button style='width:350px;text-align:center;' class='btn btn-outline-primary' onclick='abrirC()' name='btn' disabled>Conceder</button>
<br/>
<button style='width:350px;text-align:center;' class='btn btn-outline-danger' onclick='abrirR()' name='btn' disabled>Recusar pedido</button>
<br/>
<br/>
<p style='color:gray;' class='h6'>Esse pedido foi: $status</p>
</div>
";

}

?>