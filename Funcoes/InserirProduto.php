<?php

#Funcao que insere registro no banco de dados

#se conecta com o database
include('conexao.php');

#importa as informações do formulario externo
$codigo = $_POST['codigo'];
$desc=$_POST['nome'];
$NCM = $_POST['NCM'];
#--------------------------------------------


$sql = "INSERT INTO produtos (Codigo,Descricao,NCM) VALUES ('$codigo','$desc','$NCM')";  #Codigo SQL para inserir registros no database

$resultado = $mysqli->query($sql);      #Executa codigo SQL

if($resultado == true){         #Testa se foi executado corretamente
    header("Location:\pw/ExibirProduto.php");
}else{                          #Retorna erro caso falhar
    echo "Erro ao tentar inserir o produto!";
}

$mysqli->close();#fecha a conexao com o database
?>