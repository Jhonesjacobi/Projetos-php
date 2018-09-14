<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Página de Login do Administrador</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body>
		<div class="login">
			<form action="logado.php" method="post">
			
				<input type="text" name="admin" 
				class="form-control" 
				placeholder="Usuário" required />
				
				<input type="password" name="pass" 
				class="form-control" 
				placeholder="Senha" required />
				
				<input type="submit" class="btn btn-success"
				value="Logar como Admin" />		
			</form>
		</div>
	</body>
</html>	