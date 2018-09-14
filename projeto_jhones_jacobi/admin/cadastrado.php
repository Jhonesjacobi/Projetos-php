<?php
//conexao
require ('conexao.php');

//variáveis
	$nome = $_POST['nome'];
	$foto = $_POST['foto'];
	$valor = $_POST['valor'];
	$categoria = $_POST['categoria'];
	$status = $_POST['status'];
	$descr = $_POST['descricao'];
	$descricao = nl2br($descr); //para formatar as quebras de linha
	
//comando para inserir no banco	
	$sql = "INSERT INTO produtos(nome,foto,descricao,valor,categoria,status)
	VALUES('$nome', '$foto', '$descricao', '$valor', '$categoria', '$status')";
	$result = $con->query($sql);

//verificação da ação	
	if($result){
		header("Location: listar.php");
	}else{
		echo "<h1>Ocorreu um erro ao cadastrar!</h1>";
	}
	
?>