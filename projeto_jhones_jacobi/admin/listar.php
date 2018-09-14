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
			<h1>Lista de Produtos Cadastrados</h1>
				<table class="tabela2" width="900" border="1" cellspacing="0">
					<tr>
						<th>Código</th>
						<th>Produto</th>
						<th>Categoria</th>
						<th>Valor</th>
						<th>Status</th>
						<th>Mudar</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
						
						<?php
							//conexao
							require ('conexao.php');

							//busca dos dados
							$sql = "SELECT * FROM produtos";
							$query = $con->query($sql);
							while($dados = $query->fetch_array()){
								
								$codigo = $dados['id_produto'];
								$nome = $dados['nome'];
								$categoria = $dados['categoria'];
								$valor = $dados['valor'];
								$valor = number_format($valor, 2, ',', '.');
								$status = $dados['status'];
								
							echo "
								<tr>
									<td>$codigo</td>
									<td>$nome</td>
									<td>$categoria</td>
									<td>R$ $valor</td>
									<td>$status</td>";
									
									if ($status == "inativo"){
									echo "	
									<td><a href='ativar.php?codigo=$codigo'>
									<img src='../img/check.png' title='ativar' /></a></td>";
									}else{
									echo "	
									<td><a href='desativar.php?codigo=$codigo'>
									<img src='../img/block.png' title='desativar' /></a></td>";
									}									
									echo "
									<td><a href='editar.php?codigo=$codigo'>
									<img src='../img/edit.png' title='editar' /></a></td>
									
									<td><a onClick='return confirm(\"Você tem, certeza que deseja apagar?\");' href='apagar.php?codigo=$codigo'>
									<img src='../img/delete.png' title='excluir' /></a></td>
								</tr>	
									";
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

