<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){
	$total = $_SESSION['total'];
?>	

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Carrinho de compras</title>
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
				
					if(empty($_GET['email'])){
						
						echo "Não há nenhuma compra para finalizar!";
					
					}else{
					
					$email = $_GET['email'];
					//conexao
					require('../admin/conexao.php');
					?>
					<h2 class="center">Dados da Compra</h2>
					<div class="compras">
						<div class="dados_id">
							<?php
								$sql = "SELECT * FROM clientes WHERE email='$email'";
								$query = $con->query($sql);
								while($dados = $query->fetch_array()){
									$nome =$dados['nome'];
									$sobrenome =$dados['sobrenome'];
									$email =$dados['email'];
									$CPF =$dados['CPF'];
									$endereco =$dados['endereco'];
									$bairro =$dados['bairro'];
									$cidade =$dados['cidade'];
									$estado =$dados['estado'];
									$cep =$dados['cep'];
									
									echo" 
										<h4 class='titulo2'> Dados do Comprador</h4>
										<span class='negrito'>Cliente: </span>$nome $sobrenome<br/>
										<span class='negrito'>CPF: </span>$CPF<br/>
										<div class='endereco'>
											<h4>Endereço de Entrega</h4>
												$endereco - Bairro $bairro<br/>
												$cidade - $estado<br/>
												$cep
										</div>
										<span class='negrito'>E-mail: <span>$email<br/>
								
									";
								}
							?>
						</div>
									
						<div class="produtos_comprados">
							<h4 class="titulo2">Produtos Desejados</h4>
							<?php
								$sql = "SELECT * FROM carrinho WHERE email='$email' AND status='aberto'";	
								$query = $con->query($sql);
								while($dados = $query->fetch_array()){
									$produto = $dados['produto'];
									$valor = $dados['valor'];
									$valor = number_format($valor,2,',','.');
									
									echo"<p><span class='prod'>$produto</span>
									<span class='val'>R$ $valor</span></p>";
								}
									$total = number_format($total,2,',','.');
									echo"<h4 class=''total_compra'>Total da compra: R$ $total</h4>";
									
									
							?>
						</div>
							
					</div>	
				<?php
					}
					echo"<a href='compra_concluida.php?email=$email'>
								<button class='btn btn-danger compra'>Concluir a compra</button>
								</a>";
				?>					
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
