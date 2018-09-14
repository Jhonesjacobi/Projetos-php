<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){
	$total = $_SESSION['total'];
?>	

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Compra Concluida</title>
		<link href="../css/bootstrap.css" rel="stylesheet" />
		<link href="../css/estilos.css" rel="stylesheet" />
	</head>
	<body> 
		<div class="container">
			<header class="banner"> 
				<img src="../img/banner.jpg" />
			</header>
			<section class="principal"> 	
				<?php
				
					$email = $_GET['email'];
					//conexao
					require('../admin/conexao.php');
						
						//busca dados do carrinho 
					$sql = "SELECT * FROM carrinho WHERE email='$email' AND status='aberto'";	
					$query = $con->query($sql);	
					$i = 1;	
					while($dados = $query->fetch_array()){	
						$produto = $dados['produto'];
						${"prod".$i++} = $produto;
						
						}	
						if(empty($prod1)){
							$prod1 =' ';
							}
						if(empty($prod2)){
							$prod2 =' ';
							}
						if(empty($prod3)){
							$prod3 =' ';
							}
						if(empty($prod4)){
							$prod4 =' ';
							}
						if(empty($prod5)){
							$prod5 =' ';
							}
						if(empty($prod6)){
							$prod6 =' ';
							}
						if(empty($prod7)){
							$prod7 =' ';
							}
						if(empty($prod8)){
							$prod8 =' ';
							}	
						if(empty($prod9)){
							$prod9 =' ';
							}	
						if(empty($prod10)){
							$prod10 =' ';
							}	
					//insere na tabela compras		
					$sql = "INSERT INTO compra(email,prod1,prod2,prod3,prod4,prod5,prod6,prod7,prod8,prod9,prod10,total)
					VALUES('$email', '$prod1', '$prod2', '$prod3', '$prod4', '$prod5', '$prod6', '$prod7', '$prod8', '$prod9','$prod10','$total')";
					$result = $con->query($sql);
					
					//atualiza a tabela carrinho
						if($result){
								$sql ="UPDATE carrinho SET status='finalizado' WHERE email='$email'";
								$result = $query = $con->query($sql);
							
									header("Location: detalhes.php?email=$email");
									
						}else{
						echo "erro na compra";
						}
							// dados do cliente
								// $sql = "SELECT * FROM clientes WHERE email='$email'";
								// $query = $con->query($sql);
								// while($dados = $query->fetch_array()){
									// $nome =$dados['nome'];
									// $sobrenome =$dados['sobrenome'];
									// $email =$dados['email'];
									// $CPF =$dados['CPF'];
								// }	
				?>
			</section>
			<footer class="rodape"> 
				<?php include ('../rodape.php'); ?>			
			</footer>
		</div>
	</body>
</html>	

<?php
}else{
header("Location: logar.php");
}
?>	
