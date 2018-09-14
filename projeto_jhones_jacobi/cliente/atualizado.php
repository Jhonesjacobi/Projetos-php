<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){
	
//conexao
	require('../admin/conexao.php');

//variáveis
	$email = $_GET['email'];
	$fone = $_POST['fone'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$cep = $_POST['cep'];
	
//comando para editar dados	
	$sql = "UPDATE clientes
			SET fone='$fone', endereco='$endereco', bairro='$bairro', cidade='$cidade', estado='
			$estado', cep='$cep' WHERE email='$email'";
	
	$result = $query = $con->query($sql);
	
//verificação da ação
	if($result){	
		header("Location: perfil.php?email=$email&atualiza=ok");
	}else{
		echo "<h1> Ocorreu um erro ao atualizar!</h1>";
	}
	
}else{
header("Location:logar.php");
}
?>	