<?php
	session_start();
	session_name('admin');
	if($_SESSION['user']=='administrador'){ 
?>

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Cadastrar Novo Produto</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body>
		<div class="admin">
			<h1>Cadastrar Novo Produto</h1>
			<form method="post" action="cadastrado.php">
			  <div class="cadastrar">	
					<div class="esquerda">
						<input type="text" name="nome" class="form-control" placeholder="Nome do Produto:" />

						<input type="text" name="foto" class="form-control" placeholder="Imagem do Produto:" />

						<input type="text" name="valor" class="form-control" placeholder="Valor do Produto:" />
			
						<select name="categoria" class="form-control">
							<option disabled selected>Categoria</option>
							<option value="eletronicos">Eletrônicos</option>
							<option value="informatica">Informática</option>
							<option value="maquiagens">Maquiagens</option>
							<option value="moveis">Móveis</option>
							<option value="relogios">Relógios</option>
						</select>
				
						<select name="status" class="form-control">
							<option disabled selected>Status</option>				
							<option value="ativo">Ativo</option>
							<option value="inativo">Inativo</option>
						</select>
					</div><!-- Fim do div esquerda -->
					
					<div class="direita">
						<textarea name="descricao" class="form-control" placeholder="Descrição do Produto"></textarea>
				
						<input type="submit" class="btn btn-primary" value="Cadastrar Produto" />
					
					</div><!-- Fim do div direita -->
					
			  </div><!-- fim do div cadastrar -->
			</form>
		</div><!-- fim do div admin -->
	</body>
</html>	
<?php
}else{
header("Location: index.php");
}
?>


