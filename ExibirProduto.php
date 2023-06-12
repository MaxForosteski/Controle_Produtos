<?php
#---------Importações----------------
include('Funcoes/conexao.php');
include('Funcoes/ExcluirProduto.php');
#------------------------------------
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!------Configurações da pagina----->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------Importações css/bootstrap----------------->
    <link rel="stylesheet" href="Style/ExibirProdutoStyle.css">
    <link rel="stylesheet" href="Style/InserirProdutoStyle.css">
    <link rel="stylesheet" href="Style/HeaderStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--------------------------------------------------------->

    <title>ExibirProduto</title>

</head>

<body>
    <!------------------aba de navegação(nav)----------------------->
        <header>
            <ul>
                <li><img id="icone" src="Imagens/tabela_icone.png" alt="Icone de tabela">Controle de Produtos</li> <!--icone + nome-->
                <li><a href="ExibirProduto.php">Exibir Produtos</a></li> <!--link-->
                <li><a href="InserirProduto.html">Inserir Produtos</a></li><!--link-->
            </ul>
        </header>
    <!-------------------------------------------------------------->
        <main>
            <?php 
            #mudar o titulo caso a funçao seja mudada para "editar"
            if(isset($_GET['testeEditar'])){ #caso editar
                echo "<h1>Editar Produto</h1>";
            }else{ #caso exibir
                echo "<h1>Exibir Produtos</h1>";
            }
            ?>
            <!--inicio da tabela de exibição de registros de produtos-->
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
            <!--Gerar as linahs para cada produtos-->
            <?php 
            $sql = "SELECT * FROM produtos"; #SQL de busca no database
            $resultado = $mysqli->query($sql);#execução do SQL
            while($row = $resultado->fetch_assoc()){ #tranformar em linha
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
            if(isset($_GET['testeExclusao'])){#chama a funcao excluir no caso de clicar
                    ExcluirProduto($_GET['id']);
                }
            if(isset($_GET['testeEditar'])){#chama funcao editar e abre uma janela de edição
                    echo '
                        <div class="produto">
                            <h3>Editar</h3>
                            <form action="Funcoes/EditarProduto.php" method="post">
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
            $mysqli->close(); #fecha conexao com o database
            ?>
            
            
            </table>
        </main>
<!---------------------------------Importação de Bootstrap-------------------------------------->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!---------------------------------------------------------------------------------------------->
</body>
</html>