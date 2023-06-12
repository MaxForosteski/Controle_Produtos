<?php
#Funcao para se conectar com o banco de dados local 

#-------credenciais do database
$hostname = "localhost";
$database = "bd_controle";
$user = "root";
$password = "";
#------------------------------

$mysqli = new mysqli($hostname, $user, $password, $database);   #cria a conexão com o database

if($mysqli->connect_errno){     #testa se a conexao esta funcionando, caso nao estiver é cancelado a requisição
    die("Falha ao conectar com o Banco de Dados: $mysqli->connect_error");
}
?>
