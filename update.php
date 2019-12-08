<?php

    include 'banco.php';
    include 'funcoes.php';

	$id = null;
	if ( !empty($_GET['id']))
            {
		$id = $_REQUEST['id'];
            }

	if ( null==$id )
            {
		header("Location: index.php");
            }

	if ( !empty($_POST))
            {

		$nomeErro = null;
		$enderecoErro = null;
		$telefoneErro = null;
                $emailErro = null;
                $sexoErro = null;

		$nome = $_POST['nome'];
		$endereco = $_POST['endereco'];
		$telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $sexo = $_POST['sexo'];

		//Validação
		$validacao = true;
		if (empty($nome))
                {
                    $nomeErro = 'Por favor digite o nome!';
                    $validacao = false;
                }

		if (empty($email))
                {
                    $emailErro = 'Por favor digite o email!';
                    $validacao = false;
		}
                else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) )
                {
                    $emailErro = 'Por favor digite um email válido!';
                    $validacao = false;
		}

		if (empty($endereco))
                {
                    $endereco = 'Por favor digite o endereço!';
                    $validacao = false;
		}

                if (empty($telefone))
                {
                    $telefone = 'Por favor digite o telefone!';
                    $validacao = false;
		}

                if (empty($endereco))
                {
                    $endereco = 'Por favor preenche o campo!';
                    $validacao = false;
		}

		// update data
		if ($validacao)
        {
                    editaPessoa($conexao,$nome,$endereco,$telefone,$email,$sexo,$id);
                    header("Location: index.php");
		}
	}
        else
        {
            $data = listaInformacaoPessoa($conexao, $id);

            $data = $data["0"];

            $nome = $data['nome'];
            $endereco = $data['endereco'];
            $telefone = $data['telefone'];
            $email = $data['email'];
            $sexo = $data['sexo'];
		
	    }
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="normalize.css">
				<title>Atualizar Contato</title>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
							<div class="card">
								<div class="card-header">
                    <h3 class="well"> Atualizar Contato </h3>
                </div>
								<div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

                    <div class="control-group <?php echo !empty($nomeErro)?'error':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="text" placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($enderecoErro)?'error':'';?>">
                        <label class="control-label">Endereço</label>
                        <div class="controls">
                            <input name="endereco" class="form-control" size="80" type="text" placeholder="Endereço" value="<?php echo !empty($endereco)?$endereco:'';?>">
                            <?php if (!empty($enderecoErro)): ?>
                                <span class="help-inline"><?php echo $enderecoErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro)?'error':'';?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input name="telefone" class="form-control" size="30" type="text" placeholder="Telefone" value="<?php echo !empty($telefone)?$telefone:'';?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="help-inline"><?php echo $telefoneErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($email)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" class="form-control" size="40" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($sexoErro)?'error':'';?>">
                        <label class="control-label">Sexo</label>
                        <div class="controls">
                            <div class="form-check">
                                <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M" <?php echo ($sexo=="M" ) ? "checked" : null; ?>/> Masculino
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F" <?php echo ($sexo=="F" ) ? "checked" : null; ?>/> Feminino
                            </div>
                            </p>
                            <?php if (!empty($sexoErro)): ?>
                                <span class="help-inline"><?php echo $sexoErro;?></span>
                                <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="warning">Atualizar</button>
                        <a href="relatorio.php" type="btn" class="danger">Voltar</a>
                    </div>
                </form>
							</div>
						</div>
            </div>
        </div>
        
    </body>

    </html>
