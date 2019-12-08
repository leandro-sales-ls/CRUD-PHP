<?php

// FUNÇÃO INSERIR PESSOA OU CRIAR PESSOA, INSERINDO NO BANCO
function inserePessoa($conexao,$nome,$endereco,$telefone,$email,$sexo) {
		$query = "insert into pessoa (nome, endereco, telefone, email, sexo) 
							values ('{$nome}','{$endereco}','{$telefone}','{$email}','{$sexo}')";

    return mysqli_query($conexao, $query);
    
}

// FUNÇÃO EDITAR PESSOA
function editaPessoa($conexao,$nome,$endereco,$telefone,$email,$sexo,$id){
$x = mysqli_query($conexao,"UPDATE pessoa SET 
								nome = '$nome', 
								endereco= '$endereco',  
								telefone= '$telefone',
								email= '$email',
								sexo= '$sexo'
								WHERE id=$id");
 	 return $conexao; 

 }

 // FUNÇÃO DELETAR PESSOA	
 function deletePessoa($conexao, $id){

 	mysqli_query($conexao,"DELETE FROM pessoa WHERE id='$id'");

 	return $conexao;
 }

 // FUNÇÃO LISTAR PESSOA, LISTANDO TODOS NO RELATORIO
function listaPessoa($conexao){
	$pessoas = array();
	$resultado = mysqli_query($conexao, "select * from pessoa");
	while ($pessoa = mysqli_fetch_assoc($resultado)) {
		array_push($pessoas, $pessoa);
		
	}
	return $pessoas;
 }

 // FUNÇÃO LISTAR PESSOA, LISTANDO NO READ, AS INFORMAÇÕES DE UM UNICO USUARIO/PESSOA
 function listaInformacaoPessoa($conexao, $id){
	$pessoas = array();
	$resultado = mysqli_query($conexao, "select * from pessoa where id = ".$id.";");
	while ($pessoa = mysqli_fetch_assoc($resultado)) {
		array_push($pessoas, $pessoa);
		
	}
	return $pessoas;
 }

 

