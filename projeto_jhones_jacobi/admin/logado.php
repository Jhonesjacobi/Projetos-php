<?php
//inclui a conexão
require ('conexao.php');

$user = $_POST['admin'];
$pass = $_POST['pass'];

$sql = "SELECT admin,pass from admin WHERE admin='$user' AND pass='$pass'";
$r = $con->query($sql);

if(mysqli_num_rows($r)!=1){
	
	header("Location: index.php");
	
	}else{
	//início da sessão
	session_start();
	session_name('admin');
	$_SESSION['user']='administrador';
	header("Location: admin.php");	
}


?>