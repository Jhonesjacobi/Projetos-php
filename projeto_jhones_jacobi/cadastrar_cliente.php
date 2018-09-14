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
				<div class="cadastro">
					<h1>Cadastre-se</h1>
					<form name="cadastro" method="post" action="cliente/cadastrado.php">
						<?php
						if (isset($_GET['erro'])){

							if ($_GET['erro'] == 1){
								echo "<h5 class='erro'>
								As senhas devem ser iguais!
								</h5>";
							}
							elseif ($_GET['erro'] == 2){
								echo "<h5 class='erro'>
								Esse e-mail já está cadastrado.
								</h5>";
							}	
						}
						?>
						<input type="text" name="nome" 
						placeholder="Nome de usuário" required />
						
						<input type="email" name="email" 
						placeholder="Endereço de e-mail"required />
						
						<input type="password" name="senha" 
						placeholder="Senha"required />

						<input type="password" name="senha2" 
						placeholder="Repita a senha"required />				
							
						<input type="submit" class="btn btn-success"
						value="Cadastrar" />		
							
					</form>
				</div>
			</section>
			<footer class="rodape"> 
				<?php include ('rodape.php'); ?>			
			</footer>
		</div>
	</body>
</html>	
