<?php
session_start();
$email = $_SESSION['email'];

//conexao
require ('../admin/conexao.php');

//variáveis
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$CPF = $_POST['CPF'];
$fone = $_POST['fone'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$CEP = $_POST['CEP'];

$sql = "UPDATE clientes SET 
nome='$nome', 
sobrenome='$sobrenome', 
CPF='$CPF', 
fone='$fone', 
endereco='$endereco', 
bairro='$bairro', 
cidade='$cidade', 
estado='$estado', 
CEP='$CEP' WHERE email='$email'";
$result = $query = $con->query($sql);
    if ($result){ 
        header("Location: index.php");
    } else {
        echo "Ocorreu um erro ao atualizar os dados!";
    }
?>



