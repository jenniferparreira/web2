<?php
session_start();
    require('conexao.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    $query= "SELECT*FROM cadastro where nome = '$nome';";

    $result = mysqli_query($conexao,$query);
    $row = mysqli_num_rows($result);

    //$_SESSION['senha'] = $senha;
    //$_SESSION['tipo'] = $tipo;
    $linha = mysqli_fetch_assoc($result);

    //echo $senha;
    //echo password_verify($senha,$linha['senha']);
    if ($row == 1 && $tipo == "adm"){
        //$_SESSION['nome'] == $nome;
        header('Location: adm.html');
        exit();
    }else if($row == 1 && $linha['tipo'] == "voluntario" && password_verify($senha,$linha['senha'])==true){
        //$_SESSION['nome'] = $nome;
        header('Location: voluntario.html');
        exit();
    }else if($row == 1 && $tipo== "necessitado" && password_verify($senha,$linha['senha'])==true){
        //$_SESSION['nome'] = $nome;
        header('Location: necessitado.html');
        exit();
    }else if($row == 1 && $linha['tipo'] == "ong" && password_verify($senha,$linha['senha'])==true){
        header('Location: ong.html');
    }else{
        header('Location: login.html');
    }
?>