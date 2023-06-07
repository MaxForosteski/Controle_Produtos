<?php
include('conexao.php');

$desc=$_POST['nome'];
$NCM = $_POST['NCM'];

$sql = "INSERT INTO produtos (Descricao,NCM) VALUES ('$desc','$NCM')";

$resultado = $mysqli->query($sql);

if($resultado == true){
    $linhas_afetadas = $mysqli->affected_rows;
    echo "Consulta realizada com sucesso. $linhas_afetadas linhas foram afetadas.";
}else{
    echo "Erro ao tentar realizar a consulta:".$mysqli->error;
}

$mysqli->close();
?>