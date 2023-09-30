<?php 
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', 'YES');
define('DB', 'usuarios');

$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('não foi possivel conectar');

?>