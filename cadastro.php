<?php 
session_start();
include('conexao.php');

query = $conexao -> prepare ("INSERT INTO alunos VALUES ('$nome', md5('$senha'), '$tipo')");
$query -> execute();
?>