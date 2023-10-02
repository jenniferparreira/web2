<?php 
session_start();
include('conexao.php');
$hashed_password =password_hash(".$_POST[senha].",PASSWORD_DEFAULT);
$query = "INSERT INTO cadastro (nome, tipo, senha) VALUES ('".$_POST['nome']."', '".$_POST['tipo']."', '$hashed_password')";
if (mysqli_query($conexao, $query)) {
    header ('location: index.html');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conexao);
}
?>