<?php

//variáveis
$servidor = "localhost";   
$usuario_banco = "root";  
$senha_banco = "";   
$nome_banco = "loja";   

//conexão com o banco
$con = new mysqli($servidor, $usuario_banco, $senha_banco, $nome_banco);

// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno())trigger_error(mysqli_connect_error());
?>
