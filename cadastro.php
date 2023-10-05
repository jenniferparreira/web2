<?php 
session_start();
include('conexao.php');
//$hashed_password =password_hash(".$_POST[senha].",PASSWORD_DEFAULT);

if($_POST['tipo'] == "ong"){

$query =  "
INSERT INTO cadastro (nome, tipo, senha) VALUES ('".$_POST['nome']."', '".$_POST['tipo']."', '".$_POST['senha']."'); 
INSERT INTO ongs (nome,roupas,alimentos,higiene,briquedos) VALUES ('".$_POST['nome']."', false, false, false, false);
";

$resultado = $conexao -> multi_query($query);

}else{
    $query1 = "INSERT INTO cadastro (nome, tipo, senha) VALUES ('".$_POST['nome']."', '".$_POST['tipo']."', '".$_POST['senha']."')";
}

if (mysqli_query($conexao, $query1)) {
    $alert = "<script>alert('Cadastro realizado com sucesso');</script>";
    echo $alert;
    $voltar = "<a href= index.html><button>Ir para página inicial</button></a>";
    echo $voltar;
} else {
    echo "Error: " . $query1 . "<br>" . mysqli_error($conexao);
}
?>