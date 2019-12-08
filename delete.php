<?php
include 'banco.php';
include 'funcoes.php';

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if(!empty($_POST))
{
    $id = $_POST['id'];

    deletePessoa($conexao, $id);
    header("Location: index.php");
}
?>
    
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="normalize.css">
        <title>Deletar Contato</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Contato</h3>
                </div>
                <form class="form-horizontal" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir o contato?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="danger">Sim</button>
                        <a href="relatorio.php" type="btn" class="default">Não</a>
                    </div>
                </form>
            </div>
        </div>
        
    </body>

    </html>
