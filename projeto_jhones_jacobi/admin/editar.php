<?php
	session_start();
	session_name('admin');
	if($_SESSION['user']=='administrador'){ 
?>

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Editar Produto</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body>
		<div class="admin">
			<h1>Editar Produto</h1>
			<?php				
					$codigo = $_GET['codigo'];
			
					//conexao
					require ('conexao.php');

					//busca dos dados
					$sql = "SELECT * FROM produtos WHERE id_produto=$codigo";
					$query = $con->query($sql);
					while($dados = $query->fetch_array()){
						
						$nome = $dados['nome'];
						$foto = $dados['foto'];
						$descricao = $dados['descricao'];
						$valor = $dados['valor'];
					
			echo
			"<form method='post' action='editado.php?codigo=$codigo'>";
			?>
			
			  <div class="cadastrar">	
					<div class="esquerda">
						<input type="text" name="nome" class="form-control" 
						 value="<?php echo $nome; ?>" required />

						<input type="text" name="foto" class="form-control" 
						value="<?php echo $foto; ?>" required />

						<input type="text" name="valor" class="form-control" 
						value="<?php echo $valor; ?>" required />
			
						<select name="categoria" class="form-control" required>
							<option disabled selected>Categoria</option>
							<option value="eletronicos">Eletrônicos</option>
							<option value="informatica">Informática</option>
							<option value="maquiagens">Maquiagens</option>
							<option value="moveis">Móveis</option>
							<option value="relogios">Relógios</option>
						</select>
				
						<select name="status" class="form-control" required>
							<option disabled selected>Status</option>				
							<option value="ativo">Ativo</option>
							<option value="inativo">Inativo</option>
						</select>
					</div><!-- Fim do div esquerda -->
					
					<div class="direita">
						<textarea name="descricao" class="form-control" 
						required ><?php echo $descricao; ?></textarea>
					<?php
						} //fim do while da linha 22
					?>
						<input type="submit" class="btn btn-primary" value="Salvar Edição" />
					
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


