<?php
    include('conexao.php');
    $codigo = $_POST['codigo'];
    $desc = $_POST['desc'];
    $NCM = $_POST['NCM'];

    $sql="UPDATE produtos SET Descricao = '$desc' , NCM = '$NCM' WHERE Codigo = $codigo";

    $resultado = $mysqli->query($sql); 
    if($resultado == true){
        header("Location:ExibirProduto.php");
    }else{
        echo "Erro ao tentar realizar a Modificação:".$mysqli->error;
    }

?>