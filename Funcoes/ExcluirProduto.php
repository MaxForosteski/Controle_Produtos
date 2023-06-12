<?php
function ExcluirProduto($id){
    #Funcao de Excluir registros do database

    #se conecta com o banco
    include('conexao.php');

    $sql="DELETE FROM produtos WHERE codigo = $id"; #Codigo SQL que Deleta Registros

    $resultado = $mysqli->query($sql); #Executa o Codigo SQL

    if($resultado == true){     #Testa se o codigo foi executado corretamente
        header("Location:\pw/ExibirProduto.php");
    }else{                      #Retorna erro caso falhar
        echo "Erro ao tentar realizar a Exclusao:".$mysqli->error;
    }
    
    $mysqli->close(); #fecha a conexao com o database
    
    exit(); 
} 
?>
