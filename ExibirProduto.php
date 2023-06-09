<?php
include('conexao.php');
include('ExcluirProduto.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExibirProduto</title>
</head>
<body>
    <table>
        <tr>
            <th>
                <p>Codigo</p>
            </th>
            <td>
                <p>Descricao</p>
            </td>
            <td>
                <p>NCM</p>
            </td>
            <td>
                <p>Editar/</p>
            </td>
            <td>
                <p>Excluir</p>
            </td>
        </tr>
        
        <?php 
        $sql = "SELECT * FROM produtos"; 
        $resultado = $mysqli->query($sql);
        while($row = $resultado->fetch_assoc()){
            echo '<tr>
                    <th>
                        <p>' . $row['Codigo'] .'</p>
                    </th>
                    <td>
                        <p>'.$row['Descricao'].'</p>
                    </td>
                    <td>
                        <p>'.$row['NCM'].'</p>
                    </td>
                    <td>
                        <a href="ExibirProduto.php?testeEditar=true&id='.$row['Codigo'] .'"><p>Editar</p></a>
                    </td>
                    <td>
                        <a id ="excluir" href="ExibirProduto.php?testeExclusao=true&id='.$row['Codigo'] .'"><p>Excluir</p></a>
                    </td>
                </tr>';
            
            
        }    
        if(isset($_GET['testeExclusao'])){
                ExcluirProduto($_GET['id']);
            }
        if(isset($_GET['testeEditar'])){
                echo '<form action="EditarProduto.php" method="post">
                        <input type="hidden" name="codigo" value="'.$_GET['id'].'">
                        <label for="nome">Descricao</label>
                        <input type="text" name="desc" placeholder="Descricao">
                        <br>
                        <label for="NCM">NCM</label>
                        <input type="number" name="NCM">
                        <br>
                        <input type="submit" name="Enviar">
                    </form>';
            }
        $mysqli->close();
        ?>
        
        
    </table>
</body>
</html>