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
		<title>Perfil</title>
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
				<div class="perfil">
				
					<div class="editar_perfil">
						<h2>Editar Perfil</h2>
						<?php
							$email = $_GET['email'];
							$sql = "SELECT * FROM clientes WHERE email='$email'";
							$query = $con->query($sql);
								while($dados = $query->fetch_array()){
									$nome = $dados['nome'];
									$sobrenome = $dados['sobrenome'];
									$CPF = $dados['CPF'];
									$fone = $dados['fone'];
									$endereco = $dados['endereco'];
									$bairro = $dados['bairro'];
									$cidade = $dados['cidade'];
									$estado = $dados['estado'];
									$CEP = $dados['CEP'];
						
						echo" <form class='atualiza' method='post' action='atualizado.php?email=$email'>";
						
						?>
						<div class="form-group form-inline">
							<label>Nome: </label>
							<input type="text" name="nome" class="form-control" 
							value="<?php echo $nome ?>" disabled  />
						</div>

						<div class="form-group form-inline">
							<label>Sobrenome: </label>
							<input type="text" name="sobrenome" class="form-control" 
							value="<?php echo $sobrenome ?>" disabled  />
						</div>						

						<div class="form-group form-inline">
							<label>CPF: </label>
							<input type="text" name="CPF" class="form-control"
							value="<?php echo $CPF; ?>" disabled />
						</div>

						<div class="form-group form-inline">
							<label>Telefone: </label>
							<input type="text" name="fone" class="form-control"
							value="<?php echo $fone; ?>" />
						</div>						

						<div class="form-group form-inline">
							<label>Endereço: </label>
							<input type="text" name="endereco" class="form-control"
							value="<?php echo $endereco; ?>" />
						</div>
						
						<div class="form-group form-inline">
							<label>Bairro: </label>
							<input type="text" name="bairro" class="form-control"
							value="<?php echo $bairro; ?>" />
						</div>						

						<div class="form-group form-inline">
							<label>Cidade: </label>
							<input type="text" name="cidade" class="form-control"
							value="<?php echo $cidade; ?>" />
						</div>

						<div class="form-group form-inline">
							<label>Estado: </label>
							<input type="text" name="estado" class="form-control"
							value="<?php echo $estado; ?>" />
						</div>	

						<div class="form-group form-inline">
							<label>CEP: </label>
							<input type="text" name="CEP" class="form-control"
							value="<?php echo $CEP; ?>" />
						</div>
						
							<input type="submit" class="btn btn-success alt" 
							value="Alterar Dados" />
												
						</form>						
						<?php
							if(isset($_GET['atualiza'])){
								echo "<h4 class='ok'>Dados Atualizados!</h4>";
							}
						}
						echo"
					<h4>Trocar Senha</h4>
					<form class='atualiza' method='post' 
					action='mudar_senha.php?email=$email'>";
					?>
						<div class="form-group form-inline">
							<label>SENHA: </label>
							<input type="password" name="senha" class="form-control"
							placeholder="Digite a Nova Senha" />
						</div>

						<div class="form-group form-inline">
							<label>REPITA A SENHA: </label>
							<input type="password" name="senha2" class="form-control"
							placeholder="Repita a Nova Senha" />
						</div>						

						<input type="submit" class="btn btn-danger alt" 
							value="Alterar Senha" />				
						
						<?php	
							if(isset($_GET['erro'])){
								echo "<h4 class='ok erro'>Erro! As senhas devem ser iguais!</h4>";
							}
							if(isset($_GET['senha'])){
								echo "<h4 class='ok'>Senha Alterada!</h4>";
							}
						?>
						
					</form>
					</div>
					<div class="compras_realizadas">
						<h2>Compras Realizadas</h2>	
						<?php
							$sql = "SELECT * FROM compra WHERE email='$email'";
							$r = $con->query($sql);
								if(mysqli_num_rows($r)==0){
									echo"Você ainda não tem compras.";
								}else{
									while($dados = $r->fetch_array()){
										$codigo_compra = $dados['id_compra'];
										$timestamp = $dados['data_compra'];
										$data = substr($timestamp, 0, 10);
										$data = explode("-", $data);
										$data_compra = $data[2] . "/" . $data[1] . "/" . $data[0];
									
										$produto1 = $dados['prod1'];
										$produto2 = $dados['prod2'];
										$produto3 = $dados['prod3'];
										$produto4 = $dados['prod4'];
										$produto5 = $dados['prod5'];
										$produto6 = $dados['prod6'];
										$produto7 = $dados['prod7'];
										$produto8 = $dados['prod8'];
										$produto9 = $dados['prod9'];
										$produto10 = $dados['prod10'];
										
										$total = $dados['total'];
										$total = number_format($total,2,',','.');
										
										
										echo "
										<div class='comprar'>
										  <h4>Compra nº $codigo_compra </h4>
										  <h5>Data: $data_compra</h5>
										  <dl>";
												if(isset($dados['prod1'])){
													echo "<dt>$produto1</dt>";}

												if(isset($dados['prod2'])){
													echo "<dt>$produto2</dt>";}

												if(isset($dados['prod3'])){
													echo "<dt>$produto3</dt>";}													
												if(isset($dados['prod4'])){
													echo "<dt>$produto4</dt>";}

												if(isset($dados['prod5'])){
													echo "<dt>$produto5</dt>";}

												if(isset($dados['prod6'])){
													echo "<dt>$produto6</dt>";}

												if(isset($dados['prod7'])){
													echo "<dt>$produto7</dt>";}

												if(isset($dados['prod8'])){
													echo "<dt>$produto8</dt>";}

												if(isset($dados['prod9'])){
													echo "<dt>$produto9</dt>";}													
												if(isset($dados['prod10'])){
													echo "<dt>$produto10</dt>";}	
										  echo "</dl>
										     <h5 class='verde'>Total: $total</h5>
										  </div>";	
									}
								}
						?>
					</div>
					
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
