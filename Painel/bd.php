<?php

session_start();
include_once("testeclasse.php");
function inserir(user $usuario){
    $pop = $usuario->nome;
    $pop2 = $usuario->senha;
    $pop3 = $usuario->nivelAcesso;
$conexao = mysqli_connect("localhost", "root", "","testeregistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
$cmdVerifica = "SELECT * FROM user WHERE Nome = '$pop'";
$resultadoVerifica = mysqli_query($conexao,$cmdVerifica);
$conta = mysqli_num_rows($resultadoVerifica);

if($conta <= 0){
$cmd = "INSERT INTO user(Nome,Senha,NivelDeAcesso) VALUES('$pop','$pop2', '$pop3') ";
if(empty($pop) || empty($pop2) || empty($pop3)){
echo '<h1 style="font-family:verdana;color:Red;background-color:white;">VOCÊ NÃO PREENCHEU OS CAMPOS CORRETAMENTE</h1>';
}
else{
if(mysqli_query($conexao, $cmd)){
   echo '<h1 style="font-family:verdana;color:Red;background-color:white;">Sucesso ao cadastrar novo usuário</h1>';
}

else{
   echo '<h1 style="font-family:verdana;color:Red;background-color:white;">Falha ao cadastrar novo usuário</h1>';
 }
}
}
else{
    echo '<h1 style="font-family:verdana;color:Red;background-color:white;"> Falha esse USUÁRIO JÁ FOI CADASTRADO</h1>';
    
}
}


function logar(user $usuario)
{
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");

 $login = $usuario->nome;
 $senha = $usuario->senha;
 $cmd = "SELECT * FROM User WHERE Nome = '$login' AND Senha = '$senha'";
 $result = mysqli_query($conexao,$cmd);
 $row = mysqli_fetch_array($result);
 $niveldeacesso = $row['NivelDeAcesso'];
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
resultado ele redirecionará para a página site.php ou retornara  para a página 
do formulário inicial para que se possa tentar novamente realizar o login */

if(mysqli_num_rows($result) > 0 )
{
$_SESSION['nome'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['niveldeacesso'] = $niveldeacesso;
header('location:AUnicaPastaSeriadessecomputador/Painel.php');
}
else{
  unset ($_SESSION['nome']);
  unset ($_SESSION['senha']);
  unset ($_SESSION['niveldeacesso']);
  if(empty($login) || empty($senha)){
 echo "<script language='javascript'> alert('Você não preencheu os campos corretamente')</script>";
  }
  else{
 echo "<script language='javascript'> alert('Falha ao realizar login')</script>";
}
   
  }

}

function cadastrarSala(sala $novaSala){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
$numeroSala = $novaSala->Numero;
$disponibilidade = $novaSala->Disponibilidade;
$cmdVerifica = "SELECT * FROM salas WHERE NumeroSala = '$numeroSala'";
$resultadoVerifica = mysqli_query($conexao,$cmdVerifica);
$conta = mysqli_num_rows($resultadoVerifica);
if($conta <= 0){
$cmd = "INSERT INTO salas (NumeroSala, Disponibilidade) VALUES('$numeroSala','$disponibilidade')";
$resultadocmd = mysqli_query($conexao, $cmd);
if (!$conexao) {
    echo "<script language='javascript'> alert('Falha ao cadastrar')</script>";
}else{
    echo "<script language='javascript'> alert('Cadastro realizado com sucesso')</script>";
} 
}
else
{
    echo "<script language='javascript'> alert('Sala já cadastrada no banco de dados')</script>";
}
}

function realizarPedido(pedido $novoPedido){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
    $Texto = $novoPedido->Texto;
    $Status = $novoPedido->Status;
    $Autor = $novoPedido->Autor;
    $Sala = $novoPedido->Sala;
    
    $Autor = $novoPedido->Autor;
    $Sala = $novoPedido->Sala;
   $cmd = "SELECT * FROM pedido WHERE Autor = '$Autor'";
   $seleciona = mysqli_query($conexao, $cmd);
   $row = mysqli_fetch_array($seleciona);
   $statusA = $row['Status'];
   $nomeA = $row['Autor'];

if($Texto == ''){
    echo "<script language='javascript'> alert('Você tem que formular um texto para o pedido!')</script>";
}
    else{
if(($nomeA == $Autor) && ($statusA == 'Aguardando')){
    echo "<script language='javascript'> alert('Você já tem um pedido aguardando em nosso banco de dados!')</script>";
}
else{
$sqlInserirPedido = "INSERT INTO pedido(Texto,Status,Autor,Sala) VALUES('$Texto','$Status','$Autor','$Sala');";
if(mysqli_query($conexao,$sqlInserirPedido)){
    echo "<script language='javascript'> alert('Pedido enviado com sucesso!')</script>";
}
else{
    echo "<script language='javascript'> alert('Falha ao enviar pedido!')</script>";
}
   }
  
 }
}
function aceitarPedido(pedido $novoPedido){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
$numero = $novoPedido->ID_Pedido;
$nomeusuario = $_SESSION['nome'];
$sala = $novoPedido->Sala;
$autorpedido = $novoPedido->Autor;
    $cmd = "DELETE FROM pedido WHERE ID_Pedido = '$numero'";
   $cmd2 = "INSERT INTO mensagem(Autor,Texto,Destinatario) VALUES('$nomeusuario','Seu pedido foi aceito pela administração, passe na secretaria e pegue a chave da sala $sala', '$autorpedido') ";
if((mysqli_query($conexao, $cmd))&&(mysqli_query($conexao,$cmd2))){
     $_SESSION['respostarp'] = 'Sucesso ao aceitar pedido';
     $resposta = $_SESSION['respostarp'];
     header("Location: ListaDePedidos.php?resposta=$resposta");      
}
else{
    $_SESSION['respostarp'] = 'Falha ao aceitar pedido';
    $resposta = $_SESSION['respostarp'];
    header("Location: ListaDePedidos.php?resposta=$resposta");
}
}
function recusarPedido(pedido $novoPedido){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
$numero = $novoPedido->ID_Pedido;
$nomeusuario = $_SESSION['nome'];
$sala = $novoPedido->Sala;
$autorpedido = $novoPedido->Autor;
//DELETE FROM `pedido` WHERE `pedido`.`ID_Pedido` = 16
   $cmd = "DELETE FROM pedido WHERE ID_Pedido = '$numero'";
   $cmd2 = "INSERT INTO mensagem(Autor,Texto,Destinatario) VALUES('$nomeusuario','Seu pedido da sala $sala, foi recusado', '$autorpedido') ";
if((mysqli_query($conexao, $cmd))&&(mysqli_query($conexao,$cmd2))){
     $_SESSION['respostarp'] = 'Sucesso ao recusar pedido';
     $resposta = $_SESSION['respostarp'];
     header("Location: ListaDePedidos.php?resposta=$resposta");      
}
else{
    $_SESSION['respostarp'] = 'Falha ao recusar pedido';
    $resposta = $_SESSION['respostarp'];
    header("Location: ListaDePedidos.php?resposta=$resposta");
}
}
function postar(postagemNormal $novaPostagem){
            $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
            mysqli_set_charset($conexao,"utf8");
            
            $data = $novaPostagem->Imagem;
            
            $postador = $novaPostagem->Postador;
            $descricao = $novaPostagem->Descricao;
            $titulo = $novaPostagem->Titulo;
            $dataA = $novaPostagem->Data;
            
            echo "<h1 style='background-color:fuchsia;color:white;'>Selecionou: $postador + $descricao + $titulo + $dataA + <br/> $data</h1>";
            $sqlInserir = "INSERT INTO postagem(Titulo,Descricao,Imagem,Data,Postador) VALUES('$titulo','$descricao','$data','$dataA','$postador');";
            if(mysqli_query($conexao,$sqlInserir)){
                 echo "<h1 style='background-color:blue;color:white;'>Sucesso!</h1>";
            }else{
             echo "<h1 style='background-color:purple;color:white;'>Falha</h1>";
             }
}
function enviarEmail(mensagem $novoEmail){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
     $Autor = $novoEmail->Autor;
     $texto = $novoEmail->Texto;
     $destinatario = $novoEmail->Destinatario;
     echo "<h1 style='background-color:green;color:white;'>$Autor, AA: $texto, $destinatario</h1>";
$cmd = "INSERT INTO mensagem(Autor,Texto,Destinatario) VALUES('$Autor','$texto', '$destinatario') ";
if(isset($destinatario) & isset($texto)){echo "<h1 style='background-color:red;color:white;font-family:arial;font-style:italic'>O email deve possuir um destinatário e um texto obrigatoriamente</h1>"; }
else{
if(mysqli_query($conexao, $cmd)){
     $_SESSION['respostarEV'] = 'Sucesso ao enviar a mensagem';
     echo "<h1 style='background-color:red;color:white;font-family:arial;font-style:italic'>Sucesso</h1>";     
}
else{
    $_SESSION['respostaEV'] = 'Erro ao enviar a mensagem';

    echo "<h1 style='background-color:red;color:white;font-family:arial;font-style:italic'>Erro</h1>";
}
}
}
function responderEmail(mensagem $novoEmail){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
     $Autor = $novoEmail->Autor;
     $texto = $novoEmail->Texto;
     $destinatario = $novoEmail->Destinatario;
     echo "<h1 style='background-color:green;color:white;'>$Autor, AA: $texto, $destinatario</h1>";
$cmd = "INSERT INTO mensagem(Autor,Texto,Destinatario) VALUES('$Autor','$texto', '$destinatario') ";
if(mysqli_query($conexao, $cmd)){
     $_SESSION['respostarEV'] = 'Sucesso ao enviar a mensagem';
     echo "<h1 style='background-color:red;color:white;font-family:arial;font-style:italic'>Sucesso</h1>";     
}
else{
    $_SESSION['respostaEV'] = 'Erro ao enviar a mensagem';

    echo "<h1 style='background-color:red;color:white;font-family:arial;font-style:italic'>Erro</h1>";
}
}

function excluirEmail(mensagem $novoEmail){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
$numero = $_GET['Numero'];
//DELETE FROM `pedido` WHERE `pedido`.`ID_Pedido` = 16
   $cmd = "DELETE FROM mensagem WHERE ID_Mensagem = '$numero'";
if(mysqli_query($conexao, $cmd))
{
     $_SESSION['respostarEV'] = 'Sucesso ao excluir mensagem';
     header("Location: CaixaDeEntrada.php");
    echo "Sucesso ao excluir mensagem";  

}

else{
    $_SESSION['respostarEV'] = 'Erro ao excluir mensagem';
    header("Location: CaixaDeEntrada.php");
    echo "Erro ao excluir mensagem";

}

}

function excluirUsuario(user $usuario){
    $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
    $usuariox = $usuario->nome;
    echo "<h1 style='font-size:80x;color:white;'>$usuariox</h1>";
             $deletar = "DELETE FROM User WHERE Nome = '$usuariox';";
             if(mysqli_query($conexao,$deletar))
                {
                    header('Location: usuarios.php');

         }
             else{
                echo "Erro ao deletar o usuário";
                header('Location: usuarios.php');
             }
}
function editarUsuario(user $usuario)
{
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
    $nome = $usuario->nome;
    $senha = $usuario->senha;
    $niveldeAcesso = $usuario->nivelAcesso;


    $cmd = "SELECT * FROM User WHERE Nome = '$nome'";
    $seleciona = mysqli_query($conexao, $cmd);
    $conta = mysqli_num_rows($seleciona);
  
    if($conta == 0){
    $antigoNome = $_SESSION['AntigoN'];
    $antigaSenha = $_SESSION['AntigaS'];
    $antigoNV = $_SESSION['AntigaNiv'];
    $inserir = "UPDATE User SET Nome = '$nome', Senha = '$senha', NivelDeAcesso = '$niveldeAcesso' WHERE Nome = '$antigoNome'";
       if(mysqli_query($conexao,$inserir)){
        echo "<script language='javascript'> alert('Sucesso ao alterar os dados')</script>";
       }
       else
      {
        echo "<script language='javascript'> alert('Falha ao alterar os dados')</script>";
      }
  }
  else{
    $antigoNome = $_SESSION['AntigoN'];
    $antigaSenha = $_SESSION['AntigaS'];
    $antigoNV = $_SESSION['AntigaNiv'];
    if($nome != $antigoNome){
        echo "<script language='javascript'> alert('O nome escolhido já está em uso')</script>";
        }
    else{
    $antigoNome = $_SESSION['AntigoN'];
    $antigaSenha = $_SESSION['AntigaS'];
    $antigoNV = $_SESSION['AntigaNiv']; 
    if(($nome == $antigoNome)  & ($senha == $antigaSenha) & ($niveldeAcesso == $antigoNV)){
        echo "<script language='javascript'> alert('Faça alguma alteração')</script>";
    }
    else{
    $antigoNome = $_SESSION['AntigoN'];
    $antigaSenha = $_SESSION['AntigaS'];
    $antigoNV = $_SESSION['AntigaNiv']; 
    echo "<script language='javascript'> alert('Sucesso ao alterar os dados')</script>";

    $inserir = "UPDATE User SET Nome = '$nome', Senha = '$senha', NivelDeAcesso = '$niveldeAcesso' WHERE Nome = '$antigoNome'";
    if(mysqli_query($conexao,$inserir)){
       }
    else
      {
        echo "<script language='javascript'> alert('Falha ao alterar os dados')</script>";
      }
    }
    }

   
  }
}
function registraTurma(turma $novaTurma){
    function grs($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$Numero = $novaTurma->numero;


volta:
$Codigo = grs();
$cmd1 = "SELECT * FROM TURMA WHERE Codigo = '$Codigo'";
$seleciona = mysqli_query($conexao,$cmd1);
$conta = mysqli_num_rows($seleciona);
if($conta == 0){
$cmd = "INSERT INTO turma(Numero,Codigo) VALUES('$Numero','$Codigo')";
if(mysqli_query($conexao,$cmd)){
    $_SESSION['msgregistra'] = "Sucesso ao inserir turma: Numero: $Numero / Código: $Codigo";
    header("Location: registrarturma.php");
}
else{$_SESSION['msgregistra'] = "Fracasso ao inserir turma, o numero que você inseriu já esta sendo utilizado";
header("Location: registrarturma.php");
}
}
else{goto volta;}
}


function excluirSala(sala $novaSala){
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
         ("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
$numero = $novaSala->Numero;
$deletar = "DELETE FROM salas WHERE NumeroSala = '$numero';";
if(mysqli_query($conexao,$deletar))
                {
                    echo "<script language='javascript'> alert('Sucesso ao excluir sala')</script>";

         }
             else{

                echo "<script language='javascript'> alert('Erro ao excluir sala')</script>";
             }



}

function alterarDisponibilidadeSala(sala $salan)
{
$conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
         ("Sem conexão com o servidor");
mysqli_set_charset($conexao,"utf8");
    $disponibilidade = $salan->Disponibilidade;
    $numeroSala = $salan->Numero;
    echo "<h1 style='background-color:fuchsia;color:white;font-size:80px;'>AAA!</h1>";
    if($disponibilidade == 0){
             $alterar = "UPDATE salas SET Disponibilidade = '1' WHERE NumeroSala='$numeroSala';";
             if(mysqli_query($conexao,$alterar))
                {
                    echo "<script language='javascript'> alert('Sala alterada $numeroSala com sucesso!')</script>";
                    header("Location: ListaDeSalas.php");
         }
             else{
                    echo "<script language='javascript'> alert('Erro ao alterar a sala $numeroSala')</script>";
                    header("Location: ListaDeSalas.php");
             }
           }
           else{
            $alterar = "UPDATE salas SET Disponibilidade = '0' WHERE NumeroSala='$numeroSala';";
             if(mysqli_query($conexao,$alterar))
                {
                    echo "<script language='javascript'> alert('Sala alterada $numeroSala com sucesso!')</script>";
                    header("Location: ListaDeSalas.php");
         }
             else{
                echo "<script language='javascript'> alert('Erro ao alterar a sala $numeroSala')</script>";
                header("Location: ListaDeSalas.php");
             }

           }
}
function inserirCronograma(cronograma $newCronograma){
    $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
         ("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");
   
    $data = $newCronograma->Data;
    $pdf = $newCronograma->Pdf;
    echo "<h1 class = 'h1' style='background-color:black;color:white'>$data</h1>";
    echo "<p class = 'h1' style='background-color:fuchsia;color:white; max-width: 790x;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;'>$pdf</p>";
    
    
    $cmd = "INSERT INTO Cronograma(CronogramaPDF,Data) VALUES('$pdf','$data')";
    if(!isset($data) || !isset($pdf)){
        echo "<h1 class='h1' style='color:white;background-color:fuchsia;'>Data e Pdf vazios</h1>";
    }
    else{
    $cmdb = "SELECT * FROM Cronograma WHERE Data = '$data'";
    $buscax = mysqli_query($conexao,$cmdb);
    $contax = mysqli_num_rows($buscax);

    if($contax == 0){
    if(mysqli_query($conexao,$cmd)){
        echo "<h1 class='h1' style='color:white;background-color:fuchsia;'>Sucesso</h1>";
     }
    else{
        echo "<h1 class='h1' style='color:white;background-color:fuchsia;'>Erro ao inserir o cronograma</h1>";
     }
    }
    else if($contax >= 1){
    $cmdUpdate = "UPDATE Cronograma SET CronogramaPDF='$pdf', Data='$data' WHERE Data='$data'";
    if(mysqli_query($conexao,$cmdUpdate)){
        echo "<h1 class='h1' style='color:white;background-color:fuchsia;'>Atualizado com sucesso</h1>";
     }
    else{
        echo "<h1 class='h1' style='color:white;background-color:fuchsia;'>Erro</h1>";
    }
    }
    }
    

}
function verificaCronograma($data){
    $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die
         ("Sem conexão com o servidor");
    mysqli_set_charset($conexao,"utf8");

    $dataAtual = $data;
    
    $cmd = "SELECT * FROM Cronograma WHERE Data = '$data'";
    $busca = mysqli_query($conexao,$cmd);
    $conta = mysqli_num_rows($busca);
    $row = mysqli_fetch_array($busca);
    $pdf = $row['CronogramaPDF'];
    /*echo "<p style='word-wrap:break-word'>$pdf</p>";*/

    if($conta == 0){
        echo "<h1 class='h1' style='color:white;background-color:red;'>Erro Fatal</h1>";
    }
    else{
        if($conta > 1){
          echo "<h1 class='h1' style='color:white;background-color:red;'>Erro fatal</h1>";  
        }
        else if($conta == 1){
            header("Content-Type: application/pdf");
            echo file_get_contents('data://application/pdf;base64,'. $pdf);
            
        }
    }
}



?>
</body>