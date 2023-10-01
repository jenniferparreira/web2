<?php
session_start();
    require('conexao.php');
    if (empty($_POST['nome']) || empty($_POST['senha'])){
        header('location: index.php');
        exit();
    }

    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query= "select id, tipo from cadastro where nome = '{$nome}' and senha = md5('{$senha}')";

    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result);
    $_SESSION['senha'] = $senha;

    if ($row == 1){
        $_SESSION['nome'] = $nome;

        header('Location: login_aceito.php');
        exit();
    }else {
        header('Location: login.php');
    }

?>