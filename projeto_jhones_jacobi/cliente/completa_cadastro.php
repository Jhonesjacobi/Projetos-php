<?php
session_start();
$_SESSION['user'] = 'cliente';
$email = $_SESSION['email'];
 
//conexao
require ('../admin/conexao.php');

//autologon
$sql = "SELECT * FROM clientes WHERE email='$email'";
$query = $con->query($sql);
while($dados = $query->fetch_array()){
	$nome = $dados['nome'];
?>		
<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Completa Cadastro</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body> 
		<div class="container">
			<header class="banner"> 
				<img src="../img/banner.jpg" />
			</header>
			<section class="principal"> 
				<?php						
				echo "<h2>Olá ". $nome . ", seja bem vindo!</h2>";
				}
				?>
				<h3>Por favor, complete o seu cadastro</h3>
				<form class="completa" method="post" 
				action="finalizado.php">
				
					<input type="text" name="nome" 
					placeholder="Nome: " required />
					
					<input type="text" name="sobrenome" 
					placeholder="Sobrenome: " required />

					<input type="text" name="CPF" 
					placeholder="CPF: " required />

					<input type="text" name="fone" 
					placeholder="Telefone: " required />
					
					<input type="text" name="endereco" 
					placeholder="Endereço: " required />
					
					<input type="text" name="bairro" 
					placeholder="Bairro: " required />

					<input type="text" name="cidade" 
					placeholder="Cidade: " required />	

					<input type="text" name="estado" 
					placeholder="Estado: " required />						
					<input type="text" name="CEP" 
					placeholder="CEP: " required />

					<input type="submit" class="btn btn-success" value="Finalizar Cadastro" />
					
				</form>
			</section>
			<footer class="rodape"> 
				<?php include ('../rodape.php'); ?>			
			</footer>
		</div>
	</body>
</html>



