<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){
		
//conexao
	require ('../admin/conexao.php');
	
//variáveis	
	$email = $_GET['email'];
	$senha = $_POST['senha'];	
	$senha2 = $_POST['senha2'];	
	
//verificar se as senhas são iguais	
	
	if($senha != $senha2){
		header("Location: perfil.php?email=$email&erro=1");
	}else{	
	
	$senha = hash('sha512',$senha);

	//comando para editar dados
	$sql = "UPDATE clientes SET senha='$senha' WHERE email='$email'";  
	$result = $query = $con->query($sql);
			if($result){
				header("Location: perfil.php?email=$email&senha=ok");
				}else{
					echo "<h1>Ocorreu um erro ao atualizar!</h1>";
			}
	}
}else{
header("Location: logar.php");
}
?>



