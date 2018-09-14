<?php
//inclui a conexão
require('../admin/conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = hash('sha512',$senha);

$sql = "SELECT email,senha from clientes WHERE email='$email' AND senha='$senha'";
$r = $con->query($sql);

if(mysqli_num_rows($r)!=1){

	header("Location: logar.php?erro=1");
	
	}else{
		session_start();
		session_name('cliente');
		$_SESSION['user'] = 'cliente';
		$_SESSION['email'] = $email;
		header("Location: index.php?email=$email");

	}


?>