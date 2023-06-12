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
    <link rel="stylesheet" href="ExibirProdutoStyle.css">
    <link rel="stylesheet" href="InserirProdutoStyle.css">
    <link rel="stylesheet" href="HeaderStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>ExibirProduto</title>
</head>
<body>
        <header>
            <ul>
                <li><img id="icone" src="tabela_icone.png" alt="Icone de tabela">Controle de Produtos</li>
                <li><a href="ExibirProduto.php">Exibir Produtos</a></li>
                <li><a href="InserirProduto.html">Inserir Produtos</a></li>
            </ul>
        </header>

        <main>
            <?php 
            if(isset($_GET['testeEditar'])){
                echo "<h1>Editar Produto</h1>";
            }else{
                echo "<h1>Exibir Produtos</h1>";
            }
            ?>

            <br>
            <table class="table table-striped">
            <tr>
                <th scope="col">
                    <p>Codigo</p>
                </th>
                <th scope="col">
                    <p>Descricao</p>
                </th>
                <th scope="col">
                    <p>NCM</p>
                </th>
                <th scope="col">
                    <p>Editar</p>
                </th>
                <th scope="col">
                    <p>Excluir</p>
                </th>
            </tr>
            
            <?php 
            $sql = "SELECT * FROM produtos"; 
            $resultado = $mysqli->query($sql);
            while($row = $resultado->fetch_assoc()){
                echo '<tr>
                        <th scope="row">
                            <p>' . $row['Codigo'] .'</p>
                        </th>
                        <td>
                            <p>'.$row['Descricao'].'</p>
                        </td>
                        <td>
                            <p>'.$row['NCM'].'</p>
                        </td>
                        <td>
                            <a id="editar" href="ExibirProduto.php?testeEditar=true&id='.$row['Codigo'] .'"><p>Editar</p></a>
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
                    echo '
                        <div class="produto">
                            <h3>Editar</h3>
                            <form action="EditarProduto.php" method="post">
                                <input type="hidden" name="codigo" value="'.$_GET['id'].'">
                                <label for="nome">Descricao</label>
                                <input type="text" name="desc" placeholder="Descricao do Produto" required>
                                <br>
                                <label for="NCM">NCM</label>
                                <input type="number" name="NCM" placeholder="Codigo NCM" required>
                                <br>
                                <input class="btn btn-primary" type="submit" name="Enviar" value="Editar Produto">
                                <a class="btn btn-danger" href="ExibirProduto.php">Cancelar</a>
                            </form>
                            <br>
                        </div>';
                }
            $mysqli->close();
            ?>
            
            
            </table>
        </main>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>