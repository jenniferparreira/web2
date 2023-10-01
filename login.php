<?php
session_start();
    require('conexao.php');
    if (empty($_POST['nome']) || empty($_POST['senha'])){
        header('location: index.php');
        exit();
    }

    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    $query= "select*from cadastro where nome = '{$nome}' and senha = md5('{$senha}' and tipo = '{$tipo}')";

    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result);
    $_SESSION['senha'] = $senha;

    if ($row == 1 && $tipo = 'adm'){
        $_SESSION['nome'] = $nome;
        header('Location: adm.html');
        exit();
    }else if($row == 1 && $tipo = 'voluntario'){
        $_SESSION['nome'] = $nome;
        header('Location: voluntario.html');
        exit();
    }else if($row == 1 && $tipo = 'necessitado'){
        $_SESSION['nome'] = $nome;
        header('Location: necessitado.html');
        exit();
    }else {
        header('Location: login.php');
    }

?>