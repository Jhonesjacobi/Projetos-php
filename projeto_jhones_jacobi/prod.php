<?php
$codigo = $_GET['codigo'];
$email = $_GET['email'];
//conexao
require ('admin/conexao.php');

//busca dos dados
$sql = "SELECT * FROM produtos WHERE id_produto='$codigo'";
$query = $con->query($sql);
while($dados = $query->fetch_array()){
	$valor = $dados['valor'];
	$valor = number_format($valor, 2, ',','.');
	$foto = $dados['foto'];
	$categoria = $dados['categoria'];
	$descricao = $dados['descricao'];
	echo 	"<div class='produto'>
				   <h1>". $dados['nome'] . "</h1>
				   <img src='img/produtos/$categoria/$foto' />
				   <p>" . $descricao . "</p>
				   <h2>R$ ". $valor . "</h2>
				   
				   <a href='cliente/grava_carrinho.php?codigo=".$codigo."&email=".$email."'>
				   <button class='btn btn-success'>Colocar no Carrinho</button></a>
				</div>";
} 
?>



