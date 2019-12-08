
<?php 

$dbNome = 'projetoCrud';
$dbHost = '127.0.0.1';
$dbUsuario = 'root';
$dbSenha = '';

$conexao = mysqli_connect($dbHost, $dbUsuario, $dbSenha, $dbNome);

if (mysqli_connect_errno($conexao)){
  echo "Problemas ao conectar no banco. Verifique os dados!";
}else{
  
}

?>
