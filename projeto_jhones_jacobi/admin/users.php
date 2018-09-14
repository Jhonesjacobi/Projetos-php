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
			<h1>Lista de Clientes</h1>
				<table class="tabela2" width="900" border="1" cellspacing="0">
					<tr>
						<th>Código</th>
						<th>Cliente</th>
						<th>CPF</th>
						<th>E-mail</th>
						<th>Compras</th>
					</tr>
						
						<?php
							//conexao
							require ('conexao.php');

							//busca dos dados
							$sql = "SELECT * FROM clientes ORDER BY nome ASC";
							$query = $con->query($sql);
							while($dados = $query->fetch_array()){
								
								$codigo = $dados['id_cliente'];
								$nome = $dados['nome'];
								$sobrenome = $dados['sobrenome'];
								$CPF = $dados['CPF'];
								$email = $dados['email'];
								
								
							echo "
								<tr>
									<td>$codigo</td>
									<td>$nome $sobrenome</td>
									<td>$CPF</td>
									<td>$email</td>
									<td><a href='compras.php?email=$email'>
											<img src='../img/compra.png' title='Compras do Cliente'/></a></td>
								</tr>";
							} 
						?>	
				</table>
				<div class="buttons">
					<a href="admin.php">
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

