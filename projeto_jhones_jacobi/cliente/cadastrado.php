<?php
//conexao
require ('../admin/conexao.php');

//variáveis
	$cliente = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$senha2 = $_POST['senha2'];

//verificar se as senhas são iguais	
	
	if($senha != $senha2){
		header("Location: ../cadastrar_cliente.php?erro=1");	
	}else{
		
	$senha = hash('sha512',$senha);	
	
	//Verifica se o email já existe
	$sql = "SELECT * FROM clientes WHERE email='$email'";
	$r = $con->query($sql);

	if(mysqli_num_rows($r)!=0){
		header("Location: ../cadastrar_cliente.php?erro=2");		
	}else{
		
	//comando para inserir no banco	
	$sql = "INSERT INTO clientes(nome,email,senha)
	VALUES('$cliente', '$email', '$senha')";
	$result = $con->query($sql);	
		
	//verificação da ação	
	if($result){
		session_start();
		$_SESSION['email'] = $email;
		header("Location: completa_cadastro.php");
	}else{
		echo "<h1>Ocorreu um erro ao cadastrar!</h1>";
	}
  }
}		
?>


