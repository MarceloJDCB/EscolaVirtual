<?php
include_once("testeclasse.php");
include_once("bd.php");
include_once("conexao.php");
include_once("MenuBar.php");
?>

<center><h1 class="h1" style="color:white;background-image: linear-gradient(to right, #37a1fe, #185182);text-align:left;font-size:50px;"><img src="../assets/img/lcp2.png" style="height: 80px;">Usuários </h1></center>
<div class="container" style="color:white;width:500px;height:810px;margin-top:60px;border:solid 2px cyan;box-shadow: 0px 0px 50px rgba(1, 22, 39, 1);background-image: linear-gradient(to bottom, #15E6CD,#37a1fe, #2F97C1);background-position: center;background-repeat: no-repeat; background-size: cover;">
<center>
  
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/CssMae.css">

	<table class="table">
  <thead>
    <tr style="color:white;">
      <th scope="col">Nome</th>
      <th scope="col">Senha</th>
      <th scope="col">#</th>
      <th scope="col">#</th>

    </tr>
  </thead>
   <tbody>
<?php
    $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
    ("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
   /*Chamar função para exclusão*/
   if (isset($_GET['numeroExc'])){
   $nome2 = $_GET['numeroExc'];
   $cmd2 = "SELECT * FROM User WHERE Nome = '$nome2'";
   $sele = mysqli_query($conexao, $cmd2);
   $row2 = mysqli_fetch_array($sele);
    $senha2 = $row2['Senha'];
    $niveldeacesso2 = $row2['NivelDeAcesso'];
    $usuario = new user($nome2,$senha2,$niveldeacesso2);
   excluirUsuario($usuario);
   }
  

   /*listagem*/
   $cmd = "SELECT * FROM User ORDER BY ID DESC";
   $seleciona = mysqli_query($conexao, $cmd);
   $conta = mysqli_num_rows($seleciona);
   if($conta <= 0)
   {
    echo "NÃO EXISTEM";

   }
   else{
    while($row = mysqli_fetch_array($seleciona)){{
    $nome = $row['Nome'];
    $senha = $row['Senha'];

    }
    echo "
    <tr>
      <td><p style='color:white;' class='h6'>$nome</p></td>
      <td><p style='color:white;' class='h6'>$senha</p></td>
      <td><a href='?numeroExc=$nome'><button type='button' class='btn btn-danger'>Excluir</button></a></td>
      <td><a href='Editar.php?numeroEdit=$nome'><button type='button' class='btn btn-warning'>Editar</button></a></td>
    </tr>
    ";

    //<p>$nome | $senha |<button type='button' class='btn btn-danger'>Excluir</button></p>
    //echo "<p>$senha</p>";
}
}
 ?>
</tbody>
</table>
</center>
</div>
