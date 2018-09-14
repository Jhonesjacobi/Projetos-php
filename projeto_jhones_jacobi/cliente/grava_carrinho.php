<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){ 
	
	//variáveis
	$codigo = $_GET['codigo'];
	$email = $_GET['email'];
	
	//conexão
	require('../admin/conexao.php');
	
	//busca de dados
	$sql = "SELECT *FROM produtos WHERE id_produto='$codigo'";
	$query = $con->query($sql);
	while($dados = $query->fetch_array()){
		
		$nome = $dados['nome'];
		$valor = $dados['valor'];
		
		
	//comando para inserir no banco	
	$sql ="INSERT INTO carrinho(email,produto,valor,status)	
	VALUES('$email','$nome','$valor','aberto')";
	$result = $con->query($sql);
	
		//verificação da ação	
		if($result){
			header("Location:carrinho.php?email=$email");
		}else{	
			echo"<h1>Ocorreu um erro ao cadastrar!</h1>";
			
			}
		}
	}else{
header("Location: logar.php");
}	
?>