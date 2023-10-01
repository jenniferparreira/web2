<?php 
session_start();
include('conexao.php');
$query = "INSERT INTO cadastro (nome, tipo, senha) VALUES ('".$_POST['nome']."', '".$_POST['tipo']."', '".md5(".$_POST[senha].")."')";
if (mysqli_query($conexao, $query)) {
    header ('location: index.html');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conexao);
}
?>