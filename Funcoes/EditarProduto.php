<?php
    #Funcao de editar um registro do database

    #se conecta com o banco
    include('conexao.php');

    #importa as informações do formulario 
    $codigo = $_POST['codigo'];
    $desc = $_POST['desc'];
    $NCM = $_POST['NCM'];
    #-----------------------------------


    $sql="UPDATE produtos SET Descricao = '$desc' , NCM = '$NCM' WHERE Codigo = $codigo"; #codigo SQL para editar o registro no Database

    $resultado = $mysqli->query($sql); #Executa o codigo SQL

    if($resultado == true){     #Testa se o Codigo SQL foi executado corretamente
        header("Location:\pw/ExibirProduto.php");
    }else{                      #Retorna erro no caso de falhar
        echo "Erro ao tentar realizar a Modificação:".$mysqli->error;
    }

    $mysqli->close(); #fecha a conexao com o banco de dados

?>