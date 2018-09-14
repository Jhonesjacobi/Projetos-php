<h2>Informática</h2>
<?php
//conexao
require ('admin/conexao.php');

//busca dos dados
$sql = "SELECT * FROM produtos WHERE categoria='informatica' AND status='ativo' ";
$query = $con->query($sql);
while($dados = $query->fetch_array()){
	$categoria = $dados['categoria'];
	$valor = $dados['valor'];
	$valor = number_format($valor, 2, ',', '.');
	$foto = $dados['foto'];
	$codigo = $dados['id_produto'];
	echo 	"<div class='produtos'>
					<a href='produto.php?codigo=$codigo&email=$email'>
				   <h4>". $dados['nome'] . "</h4>
				   <img src='img/produtos/$categoria/$foto'/></a>
				   <h5>R$ ". $valor . "</h5>
				</div>";
} 
?>


