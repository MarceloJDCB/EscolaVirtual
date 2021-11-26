<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta charset="utf-8">
</head>
<body style='background-color:#37a1fe;color:white;'>
<?php
$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
$explode = explode('/', $url);
if(file_exists('testePhplogin/'.$explode['0'].'.php')){
include('testePhplogin/'.$explode['0'].'.php');
}else{
print '
<div style="width: 100vw;height: 100vh;display: flex;flex-direction: row;justify-content: center;align-items: center;" class="container">
<div style=""class="box">
<center>
<img src="assets/img/lcp2.png" style="height: 300px;">
<h1 class="h1" style="font-size:100px;">ERRO 404</h1>
<p class="h4">PAGINA NÃO ENCONTRADA</p>
</center>
</div>
</div>
';
}
?>
</body>
</html>

