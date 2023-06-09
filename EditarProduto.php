<?php
    include('conexao.php');
    $codigo = $_POST['codigo'];
    $desc = $_POST['desc'];
    $NCM = $_POST['NCM'];

    $sql="UPDATE produtos SET Descricao = '$desc' , NCM = '$NCM' WHERE Codigo = $codigo";

    $resultado = $mysqli->query($sql); 

    header("Location:ExibirProduto.php");
    if($resultado == true){
        $linhas_afetadas = $mysqli->affected_rows;
        echo "Modificação realizada com sucesso. $linhas_afetadas linhas foram afetadas.";
    }else{
       # echo "Erro ao tentar realizar a Modificação:".$mysqli->error;
    }

?>