<?php 
    require('conexao.php');
    session_start();

  //marcar positivo

   if(isset($_POST['roupas'])){
        $query = $conexao -> prepare ("UPDATE ongs SET roupas = true WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }
    if(isset($_POST['alimentos'])){
        $query = $conexao -> prepare ("UPDATE ongs SET alimentos = true WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }
    if(isset($_POST['higiene'])){
        $query = $conexao -> prepare ("UPDATE ongs SET higiene = true WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }
    if(isset($_POST['brinquedos'])){
        $query = $conexao -> prepare ("UPDATE ongs SET briquedos = true WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }

    $queryS = "SELECT*FROM ongs WHERE nome= '".$_SESSION['nome']."'";
    $resultado = mysqli_query($conexao,$queryC) or die ("Erro ao conectar com o banco de dados");
    $row = mysqli_num_rows($resultado);
    $linha = mysqli_fetch_assoc($result);

    //marcar como negativo

    if(isset($_POST['roupas2'])){
        $query = $conexao -> prepare ("UPDATE ongs SET roupas = false WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }
    if(isset($_POST['alimentos2'])){
        $query = $conexao -> prepare ("UPDATE ongs SET alimentos = false WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }
    if(isset($_POST['higiene2'])){
        $query = $conexao -> prepare ("UPDATE ongs SET higiene = false WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }
    if(isset($_POST['brinquedos2'])){
        $query = $conexao -> prepare ("UPDATE ongs SET briquedos = false WHERE nome = '".$_SESSION['nome']."'");
        $query-> execute();
    }

mysqli_close($conexao);
?>

