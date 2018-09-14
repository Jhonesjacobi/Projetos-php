<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){ 
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
				<?php include ('../switch.php'); 
				
					if(empty($_GET['email'])){
						
						echo "Você não está logado!";
						
					}else{
				
					$email = $_GET['email'];
					//conexao
					require ('../admin/conexao.php');
					
					
					echo "<table class='prods' cellspacing='0'>
						<tr>
							<th></th>
							<th>Produto</th>
							<th>Valor</th>
						</tr>";

					//busca dos dados
					$sql = "SELECT * FROM carrinho WHERE email='$email' AND status='aberto'";						
					$query = $con->query($sql);
					while($dados = $query->fetch_array()){	
						$id = $dados['id_prod']; 
						$produto = $dados['produto'];
						$valor = $dados['valor'];
						$valor = number_format($valor, 2, ',', '.');
						echo "<tr>
									<td><a href='exclui_carrinho.php?id=$id&email=$email'>
									<img src='../img/delete.png' title='Excluir do carrinho'/></a></td>						
									<td>$produto</td>
									<td> R$ $valor</td>
								</tr>";						
						}
						echo "<tr class='total'><td colspan='2'>Total:</td>";
						
						$sum = "SELECT SUM(valor) FROM carrinho WHERE email='$email' AND status='aberto'";
						$result = $con->query($sum);
							while ($row = $result->fetch_array()) {
								$total = $row['SUM(valor)'];
								$_SESSION['total'] = $total;
								$total = number_format($total, 2, ',', '.');						
							
								echo "<td>R$ " . $total . "</td>";
						}
					}
				?>
						</tr>
						<tr>
							<td colspan="3" class="last">
								<a href="fechar_compra.php?email=<?php echo $email; ?>">
									<button class="btn btn-warning fim">Finalizar</button></a>
							</td>
						</tr>	
					</table>
					
					<a href="../index.php">
					<button class="btn btn-primary continuar">Continuar comprando</button></a>
				
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