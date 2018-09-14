<?php 
error_reporting(0);

$pagina = $_GET['pag'];
$codigo = $_GET['codigo'];

switch ($pagina){ 

case 'eletronicos': 
include "eletronicos.php"; 
break; 

case 'informatica': 
include "informatica.php"; 
break; 

case 'maquiagens': 
include "maquiagens.php"; 
break; 

case 'moveis': 
include "moveis.php"; 
break; 

case 'relogios': 
include "relogios.php"; 
break; 

default: 
include "home.php"; 
break; 


} 

?>