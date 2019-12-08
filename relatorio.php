<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="normalize.css">
    <title>Página Inicial</title>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <h2>SISTEMA DE CADASTRO <span class="badge badge-secondary">MARCIO BARBOSA</span></h2>
            </div>
        </div>
        </br>

        <h1>RELATORIO</h1>

        </br>
        </br>

        <div class="row">
            <p>
                <a href="create.php" class="success">Adicionar</a>
                <a href="index.php" class="danger">Voltar</a>
            </p>
            &nbsp
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'banco.php';
                        include 'funcoes.php';
                       
                        $pessoas = listaPessoa($conexao);

                        foreach($pessoas as $row)
                        {
                            echo '<tr>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['endereco'] . '</td>';
                            echo '<td>'. $row['telefone'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['sexo'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="success" href="read.php?id='.$row['id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="warning" href="update.php?id='.$row['id'].'">Atualizar</button>';
                            echo ' ';
                            echo '<a class="danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>