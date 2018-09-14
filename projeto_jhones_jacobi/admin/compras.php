<?php
	session_start();
	session_name('admin');
	if($_SESSION['user']=='administrador'){ 
?>

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Página Administrativa do Site</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body>
		<div class="admin">
			<h1>Relatório de Compras</h1>
				<?php
					//conexao
					require ('conexao.php');
					$email = $_GET['email'];
					
							//busca dos dados
							$sql = "SELECT * FROM compra WHERE email='$email'";
							$r = $con->query($sql);
								if(mysqli_num_rows($r)==0){
									echo "O Cliente ainda não tem compras Finalizadas.";
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
				</table>
				<div class="buttons">
					<a href="users.php">
					<button class="btn btn-primary inline">Voltar</button></a>	
					
					<a onClick="return confirm('Você tem certeza que deseja sair?')" href="sair.php">
					<button class="btn btn-danger inline">Encerrar Sessão</button></a>
				</div>	
		</div>	
	</body>
</html>	
<?php
}else{
header("Location: index.php");
}
?>

