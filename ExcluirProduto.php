<?php
function ExcluirProduto($id){
    include('conexao.php');
    $sql="DELETE FROM produtos WHERE codigo = $id";

    $resultado = $mysqli->query($sql);
    if($resultado == true){
        $linhas_afetadas = $mysqli->affected_rows;
        echo "Exclusao realizada com sucesso. $linhas_afetadas linhas foram afetadas.";
    }else{
        echo "Erro ao tentar realizar a Exclusao:".$mysqli->error;
    }
    header("Location:ExibirProduto.php");
    exit();
} 
?>
