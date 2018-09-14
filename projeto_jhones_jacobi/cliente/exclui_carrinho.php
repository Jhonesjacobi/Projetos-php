<?php
session_start();
session_name('cliente');
if($_SESSION['user']=='cliente'){

	$id = $_GET['id'];
	$email = $_GET['email'];

	//conexao
	require('../admin/conexao.php');

	$sql ="DELETE FROM carrinho WHERE id_prod='$id'";
	$query = $con->query($sql);

	header("Location: carrinho.php?email=$email");

}else{	
	header("Location: index.php");
}
?>