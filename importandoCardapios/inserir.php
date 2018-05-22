<?php

	die("Opa 'die()' AQUI");

	$restaurante = "bk";
	$nome = $_POST['nome'];
	$preco = $_POST['precos'];
	$descricao = $_POST['descricao'];
	$imagem = $_POST['imagens'];

	var_dump($nome);
	$conexao = mysqli_connect('localhost', 'root', '123456', 'importando_cardapios');

		if ($conexao){
			echo'Conectado com o banco!';
		} else {
			echo'falha na conexão!';
		}
	echo '</br>';

	$nomeRestaurante = "insert into restaurantes (nomeRestaurante) values ('$restaurante')";
	$cardapios = "insert into cardapios (nomes, precos, descricao, imagens)
				values ('$nome', '$preco', '$descricao', '$imagem')";

	mysqli_query($conexao, $nomeRestaurante) or die("Erro ao inserir no banco");
	mysqli_query($conexao, $cardapios) or die("Erro ao inserir cardapio no banco");

