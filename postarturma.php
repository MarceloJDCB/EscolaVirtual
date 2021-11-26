<?php

session_start();
if(isset($_POST['btn'])){
    	 if($_POST['Turma'] == false||$_POST['Disciplina'] == false || $_POST['Tipo'] == false || $_POST['descricao'] == false){
          echo "<h1>Preencha todos os campos: *O campo arquivo não é requerido*</h1>";
         }
         else{
         	
          $datas = $_FILES['myfile']['tmp_name'];

    	    $data = base64_encode(file_get_contents(addslashes($datas)));
    	    
    	    $postador = $_SESSION['nome'];
    	    $descricao = $_POST['descricao'];
    	    $titulo = $_POST['Tipo'];
            $disciplina = $_POST['Disciplina'];
            $turma = $_POST['Turma'];
    	    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
    	    $dataA = date('d/m/y H:i');
            echo "<h1>Selecionou: $postador + $descricao + $titulo + $dataA + <br/> $data</h1>";
            $sqlInserir = "INSERT INTO postagemturma(Tipo,Texto,Arquivo,Data,Postador,Disciplina,Turma) VALUES('$titulo','$descricao','$data','$dataA','$postador','$disciplina','$turma');";
            $conexao = mysqli_connect("localhost", "root", "","TesteRegistro") or die("Sem conexão com o servidor");
            if(mysqli_query($conexao,$sqlInserir)){
                 echo "Sucesso!";
            }else{
             echo "Falha";
             }
             }
         }
   

?>