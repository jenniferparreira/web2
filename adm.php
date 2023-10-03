<?php 
require('conexao.php');

$id= ($_POST['id']);
$nome = ($_POST['nome']);
$tipo = ($_POST['tipo']);
$senha= ($_POST['senha']);
$id2 = ($_POST['id2']);
$id3 = ($_POST['id3']);

$query = $conexao -> prepare ("INSERT INTO cadastro (nome,tipo,senha) VALUES ('$nome', '$tipo', '$senha')");
$query -> execute();

$queryD = $conexao -> prepare ("DELETE FROM cadastro WHERE id = '$id2'");
$queryD -> execute();

echo "<table border =1>";
echo "<tr>";
echo "<th> ID </th>";
echo "<tr>";
echo "<th> NOME </th>";
echo "<tr>";
echo "<th> TIPO </th>";
echo "<tr>";
echo "<th> SENHA </th>";
echo "<tr>";

$queryC = "SELECT*FROM cadastro WHERE id = '$id3'";
$resultado = mysqli_query($conexao,$queryC) or die ("Erro ao conectar com o banco de dados");

while ($row = mysqli_fetch_array($resultado)){

  $id=$row['id'];
  $nome=$row['nome'];
  $tipo=$row['tipo'];
  $senha=$row['senha'];

  echo "<tr>";
  echo "<td>".$id."</td>";
  echo "<tr>";
  echo "<td>".$nome."</td>";
  echo "<tr>";
  echo "<td>".$tipo."</td>";
  echo "<tr>";
  echo "<td>".$senha."</td>";
  echo "</tr>";
}

mysqli_close($conexao);
echo"</table>";
?>

