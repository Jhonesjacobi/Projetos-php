<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){ 
	
	$email = $_GET['email'];	
	//conexao
	require ('../admin/conexao.php');
?>

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Detalhes</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body> 
		<div class="container">
			<header class="banner"> 
				<img src="../img/banner.jpg" />
			</header>
			
			<header class="user">
				<nav class="menu"> 
					<?php include ('../menu.php'); ?>
				</nav>
				<aside>
					<?php
						if(isset($_SESSION['user'])){
					
						$sql = "SELECT * FROM clientes WHERE email='$email'";
						$query = $con->query($sql);
							while($dados = $query->fetch_array()){
							$nome = $dados['nome'];
							echo "
								<a href='perfil.php?email=$email'>
								<button class='btn btn-warning usr'>$nome</button></a>";
							}
							echo "<a href='deslogar.php'><button class='btn btn-danger'>Deslogar</button></a>";
							
							echo "<a href='carrinho.php?email=$email'><img src='../img/carrinho.png' title='Carrinho de compras' /></a>";
						
								include ('num_prods.php');
						
								if(isset($num)){
								echo "<span class='num' title='você tem $num produtos no carrinho'>$num</span>";}
					
						}else{
							echo "<a href='logar.php'>
							<button class='btn btn-success'>Logar</button></a>";
						}
					?>
				</aside>
			</header>
			<section class="principal"> 
				<?php include ('../switch.php'); ?>
				<div class="detalhes">
					<h2>Sua compra foi concluída</h2>
						<?php
						$sql = "SELECT * FROM compra WHERE email='$email'ORDER BY data_compra DESC LIMIT 1";
						$query = $con->query($sql);
							while($dados = $query->fetch_array()){
							$num = $dados['id_compra'];
							$total = $dados['total'];
							$total = number_format($total, 2, ',', '.');
						echo"<h3> Compra N° <span class='n'>$num</span></<h3>";
						echo"<h3>Valor da compra: R$ $total</h3>";
						}
						
						$sql = "SELECT * FROM clientes WHERE email='$email'";
						$query = $con->query($sql);
							while($dados = $query->fetch_array()){
							$nome = $dados['nome'];
							$sobrenome = $dados['sobrenome'];
							$CPF = $dados['CPF'];
							
							echo"
							<h4>Comprador:$nome $sobrenome</h4>
							<h4>CPF:$CPF</h4>";
							}
							?>
							<h2>Obrigado pela compra,volte sempre!</h2>
							<a href="../index.php"><button class="btn btn-warning meio">Voltar á loja</a>	
				</div>
			</section>	
			<footer class="rodape"> 
				<?php include ('../rodape.php'); ?>			
			</footer>
		</div>
	</body>
</html>	

<?php
}else{
header("Location: logar.php");
}
?>
