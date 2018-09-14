<?php
	session_start();
	session_name('admin');
	if($_SESSION['user']=='administrador'){	

		$codigo = $_GET['codigo'];	

		//conexao
		require ('conexao.php');

		$sql = "DELETE FROM produtos WHERE id_produto='$codigo'";
		$query = $con->query($sql);

		header("Location: listar.php");

	}else{
		header("Location: index.php");
}
?>