<?php

$arquivo = $_FILES["arquivo"];
$nome = $arquivo['name'];
$tipo = $arquivo['type'];
$tamanho = $arquivo['size'];

	$conteudo = file_get_contents($arquivo['tmp_name']);// converte o arquivo em binario

	$conexao = mysqli_connect("localhost", "root", "123456", "teste_binario");
	if($conexao){
	echo "Conexão ok";
	}
		if($conteudo){
			salvarBinario($conexao, $conteudo, $nome, $tipo, $tamanho);
			// header('content-type:'.$tipo);
			// echo $conteudo;
		}



function salvarBinario($conexao, $conteudo, $nome, $tipo, $tamanho){
	// if($conexao){
	// 	echo'ok'.'</br>';
	// }
	// var_dump('<pre>', $conteudo); die();
	$query = "INSERT INTO imagens(arquivo, nome, tipo, tamanho) VALUES ('$conteudo', '$nome', '$tipo', '$tamanho')";
	mysqli_query($conexao, $query) or die('Erro');
}

function exibirImagemBinaria($conexao, $id){
	$query = "select from imagens where id = '$id'";
	mysqli_query($conexao, $query);
}
