<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="normalize.css">
  <title>Adicionar Contato</title>
</head>

<body>
    <div>
        <div>
          <div>
            <div >
                <h3> Adicionar Contato </h3>
            </div>
            <div >
            <form action="create.php" method="post">

                <div <?php echo !empty($nomeErro)?'error ' : '';?>>
                    <label >Nome</label>
                    <div>
                        <input size="50"  name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                        <?php if(!empty($nomeErro)): ?>
                            <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class=" <?php echo !empty($enderecoErro)?'error ': '';?>">
                    <label class="control-label">Endereço</label>
                    <div class="controls">
                        <input size="80" name="endereco" type="text" placeholder="Endereço" required="" value="<?php echo !empty($endereco)?$endereco: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $enderecoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class=" <?php echo !empty($telefoneErro)?'error ': '';?>">
                    <label >Telefone</label>
                    <div>
                        <input size="35"  name="telefone" type="text" placeholder="Telefone" required="" value="<?php echo !empty($telefone)?$telefone: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $telefoneErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class=" <?php echo !empty($emailErro)?'error ': '';?>">
                    <label >Email</label>
                    <div >
                        <input size="40"  name="email" type="text" placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>">
                        <?php if(!empty($emailErro)): ?>
                            <span class="help-inline"><?php echo $emailErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class=" <?php echo !empty($sexoErro)?'error ': '';?>">
                    <label >Sexo</label>
                    <div>
                        <div>
                            <p>
                                <input  type="radio" name="sexo" id="sexo" value="M" <?php echo ($sexo="M" ) ? "checked" : null; ?>/> Masculino
                        </div>
                        <div>
                            <input type="radio" name="sexo" id="sexo" value="F" <?php echo ($sexo="F" ) ? "checked" : null; ?>/> Feminino
                        </div>
                        </p>
                        <?php if(!empty($sexoErro)): ?>
                            <span class="help-inline"><?php echo $sexoErro;?></span>
                            <?php endif;?>
                    </div>
                </div>
                <div>
                    <br/>

                    <button type="submit" class="success">Adicionar</button>
                    <a href="index.php" type="btn" class="danger">Voltar</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
    
</body>

</html>

<?php
    include 'banco.php';
    include 'funcoes.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
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

        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = false;
        }

        if(empty($endereco))
        {
            $enderecoErro = 'Por favor digite o seu endereço!';
            $validacao = false;
        }

        if(empty($telefone))
        {
            $telefoneErro = 'Por favor digite o número do telefone!';
            $validacao = false;
        }

        if(empty($email))
        {
            $telefoneErro = 'Por favor digite o endereço de email';
            $validacao = false;
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $emailError = 'Por favor digite um endereço de email válido!';
            $validacao = false;
        }

        if(empty($sexo))
        {
            $sexoErro = 'Por favor digite o campo!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            inserePessoa($conexao,$nome,$endereco,$telefone,$email,$sexo);
            header("Location: index.php");
        }
    }
?>
