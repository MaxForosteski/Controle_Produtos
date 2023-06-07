<?php
$hostname = "localhost";
$database = "bd_controle";
$user = "root";
$password = "";
$mysqli = new mysqli($hostname, $user, $password, $database);

if($mysqli->connect_errno){
    die("Falha ao conectar com o Banco de Dados: $mysqli->connect_error");
}
?>
