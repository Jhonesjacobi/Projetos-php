<?php
	session_start();
	session_name('cliente');
	if($_SESSION['user']=='cliente'){ 

		session_start();
		session_destroy();
		header("Location: index.php");

	}else{
header("Location: index.php");
}
?>