<?php
	session_start();
	session_name('admin');
	if($_SESSION['user']=='administrador'){ 

		session_start();
		session_destroy();
		header("Location: index.php");

	}else{
header("Location: index.php");
}
?>