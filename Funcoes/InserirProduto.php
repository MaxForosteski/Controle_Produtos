<?php
include('Funcoes/conexao.php');

$desc=$_POST['nome'];
$NCM = $_POST['NCM'];

$sql = "INSERT INTO produtos (Descricao,NCM) VALUES ('$desc','$NCM')";

$resultado = $mysqli->query($sql);

if($resultado == true){
    header("Location:\pw/ExibirProduto.php");
}else{
    echo "Erro ao tentar inserir o produto!";
}

$mysqli->close();
?>