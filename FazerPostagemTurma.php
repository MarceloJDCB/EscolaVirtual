<!DOCTYPE html>
<html>
<head>
  <title>Blob file</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <input class="btn btn-danger" action="action" onclick="window.history.go(-1); return false;" type="button" value="Back" />
  <div class="container" style="width:450px;height:752px;margin-top:100px;border:solid 10px green;background-color:white;">
     <form method="POST" action="postarturma.php" enctype="multipart/form-data">
     
     <br/>
     <p class="h4">Realizar uma postagem na turma</p>
     <p class="h4">Tipo:<input type="text" name="Tipo"/></p>
      
      <br/>

      <p class="h4">Disciplina:<input type="text" name="Disciplina"/></p>

      <br/>
      <p class="h4">Turma:<input type="text" name="Turma"/></p>

      <br/>
      <p class="h4">Arquivo:<input type="file" class="form form-control" name="myfile"/></p>
      

      <br/>
      <p class="h4">Texto:</p>
      <textarea name="descricao" rows="10" cols="47" maxlength="255"></textarea>
      <br/>
      <button style="width:350px;text-align:center;" class="btn btn-outline-primary" name="btn">Postar</button>
      
     </form>
   </div>
</body>
</html>