<?php
	session_start();
	session_name('admin');
	if($_SESSION['user']=='administrador'){ 

	//variáveis	
		$codigo = $_GET['codigo'];

	//conexao
		require ('conexao.php');

		$sql = "UPDATE produtos 
				   SET status='inativo' 
				   WHERE id_produto='$codigo'";
				   
		 $result = $query = $con->query($sql);
		  
		  header("Location: listar.php");  

}else{
header("Location: index.php");
}
?>