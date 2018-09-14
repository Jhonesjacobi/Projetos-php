<?php
//conexao
	require ('conexao.php');

//variáveis	
	$codigo = $_GET['codigo'];
	
	$nome = $_POST['nome'];
	$foto = $_POST['foto'];
	$valor = $_POST['valor'];
	$categoria = $_POST['categoria'];
	$status = $_POST['status'];
	$descr = $_POST['descricao'];
	$descricao = nl2br($descr); //para formatar as quebras de linha

//comando para editar dados
	$sql = "UPDATE produtos 
			   SET nome='$nome', foto='$foto', descricao='$descricao',
			         valor='$valor', categoria='$categoria', status='$status' 
			   WHERE id_produto='$codigo'";
			   
	 $result = $query = $con->query($sql);

//verificação da ação	
	if($result){
		header("Location: listar.php");
	}else{
		echo "<h1>Ocorreu um erro ao editar!</h1>";
	}
		      
   
?>


