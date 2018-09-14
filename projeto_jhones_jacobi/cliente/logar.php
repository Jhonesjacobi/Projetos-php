<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Página de Login do Cliente</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body>
		<div class="login">
			<form action="cliente.php" method="post">
				<?php
					if(isset($_GET['erro'])){
					echo "<h5 class='erro'>Usuário/senha Inválido</h5>";
					}
			
			?>
				<input type="email" name="email" 
				class="form-control" 
				placeholder="Email do Usuário" required />
				
				<input type="password" name="senha" 
				class="form-control" 
				placeholder="Senha" required />
				
				<a href="../cadastrar_cliente.php">Cadastre-se</a>
				
				<input type="submit" class="btn btn-success"
				value="Logar" />		
			</form>
		</div>
	</body>
</html>	