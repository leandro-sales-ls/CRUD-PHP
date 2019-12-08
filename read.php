<?php
    $id = null;
    
    if(!empty($_GET['id']))
    {

        include 'banco.php';
        include 'funcoes.php';
        
        $id = $_REQUEST['id'];
        $data = listaInformacaoPessoa($conexao, $id);

        $data = $data["0"];
    }

?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="normalize.css">
        <title>Informações</title>
    </head>

    <body>

        
        <div class="container">
            <div class="span10 offset1">
                  <div class="card">
    								<div class="card-header">
                    <h3 class="well">Informações</h3>
                </div>
                <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['nome'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['endereco'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['telefone'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Sexo</label>
                        <div class="controls">
                            <label class="carousel-inner">
                                <?php echo $data['sexo'];?>
                            </label>
                        </div>
                    </div>

                    <input type="hidden" name="idPessoa" value="<?php echo $_GET['id'] ?>">

                                        
                    </div>
                </div>

                    <br/>
                    <div class="row">
                    &nbsp
                    &nbsp
                        <a href="relatorio.php" type="btn" class="danger">Voltar</a>
                    </div>
                
                        
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
                    
    </body>

    </html>


   

    