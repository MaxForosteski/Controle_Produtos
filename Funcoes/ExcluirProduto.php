<?php
function ExcluirProduto($id){
    include('conexao.php');
    $sql="DELETE FROM produtos WHERE codigo = $id";

    $resultado = $mysqli->query($sql);
    if($resultado == true){
        header("Location:\pw/ExibirProduto.php");
    }else{
        echo "Erro ao tentar realizar a Exclusao:".$mysqli->error;
    }
    
    exit();
} 
?>
