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
			<h1>Página Administrativa do Site</h1>
				<table class="tabela1" width="800" border="1" cellspacing="0">
					<tr>
						<td>
							<a href="cadastrar.php">
							<img src="../img/cadastrar.png" />
							Cadastrar Produto</a>
						</td>
						
						<td>
							<a href="listar.php">
							<img src="../img/produtos.png" />
							Editar Produtos</a>
						</td>
						
						<td>
							<a href="users.php">
							<img src="../img/users.png" />
							Listar Usuários</a>
						</td>
					</tr>	
				</table>
				<a onClick="return confirm('Você tem certeza que deseja sair?')" href="sair.php">
				<button class="btn btn-danger">Encerrar Sessão</button></a>		
		</div>	
	</body>
</html>	
<?php
}else{
header("Location: index.php");
}
?>