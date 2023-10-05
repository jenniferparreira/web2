<?php
session_start();
    require('conexao.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);

    $query= "SELECT*FROM cadastro where nome = '$nome' and senha = '$senha';";

    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result);

    $linha = mysqli_fetch_assoc($result);

    //echo password_verify($senha,$linha['senha']);
    if ($row == 1 && $linha['tipo'] == "adm"){
        $link = '<a href=adm.php"></a>';
        $_SESSION['nome'] = $nome;
        header('Location: adm.html');
        exit();
    }else if($row == 1 && $linha['tipo'] == "voluntario"){
        $_SESSION['nome'] = $nome;
        $link = '<a href=voluntario.php"></a>';
        header('Location: voluntario.html');
        exit();
    }else if($row == 1 && $tipo== "necessitado" ){
        $_SESSION['nome'] = $nome;
        $link = '<a href=necessitado.php"></a>';
        header('Location: necessitado.html');
        exit();
    }else if($row == 1 && $linha['tipo'] == "ong"){
        $_SESSION['nome'] = $nome;
        $link = '<a href=ong.php"></a>';
        header('Location: ong.html');
    }else{
        header('Location: login.html');
    }
?>