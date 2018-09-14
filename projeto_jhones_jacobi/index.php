<?php
session_start();
session_name('cliente');
if(isset($_SESSION['user'])){
	$email = $_SESSION['email'];
	require ('admin/conexao.php');
}
?>

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
			<header class="user">
				<nav class="menu"> 
					<?php include ('menu.php'); ?>
				</nav>
				<aside>
					<?php
						if(isset($_SESSION['user'])){
					
						$sql = "SELECT * FROM clientes WHERE email='$email'";
						$query = $con->query($sql);
							while($dados = $query->fetch_array()){
							$nome = $dados['nome'];
							echo "
								<a href='cliente/perfil.php?email=$email'>
								<button class='btn btn-warning usr'>" . $nome ."</button></a>";
							}
							echo "<a href='cliente/deslogar.php'>
							<button class='btn btn-danger'>Deslogar </button></a>";
							
							echo "<a href='cliente/carrinho.php?email=$email'><img src='img/carrinho.png' title='Carrinho de compras' /></a>";
						
								include('cliente/num_prods.php');
								
								if(isset($num)){
								echo "<span class='num'title='você tem $num produtos no carrinho'> $num</span>";}
						
						}else{
							echo "<a href='cliente/logar.php'>
							<button class='btn btn-success'>Logar
							</button></a>";
						}
					?>
				</aside>
			</header>
			<section class="principal"> 
				<?php include ('switch.php'); ?>
			</section>
			<footer class="rodape"> 
				<?php include ('rodape.php'); ?>			
			</footer>
		</div>
	</body>
</html>	