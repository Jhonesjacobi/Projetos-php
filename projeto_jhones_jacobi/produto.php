<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Projeto PHP</title>
		<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="css/estilos.css" rel="stylesheet" />
	</head>
	<body> 
		<div class="container">
			<header class="banner"> 
				<img src="img/banner.jpg" />
			</header>
			<nav class="menu"> 
				<?php include ('menu.php'); ?>
			</nav>
			<section class="principal"> 
				<?php include ('switch.php'); ?>
				<?php include ('prod.php'); ?>
			</section>
			<footer class="rodape"> 
				<?php include ('rodape.php'); ?>			
			</footer>
		</div>
	</body>
</html>	