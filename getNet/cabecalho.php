<?php

function cabecalhoGetNet($linha, $conexao)
{
	$tipo = substr($linha, 0, 1);
	$data_criacao = convertData(substr($linha, 1, 8));
	$hora_criacao = convertTime(substr($linha, 9, 6));
	$data_referencia = convertData(substr($linha, 15, 8));
	$versao_arquivo = substr($linha, 23, 8);
	$estabelecimento = substr($linha, 31, 15);
	$cnpj = intval(substr($linha, 46, 14));
	$adquirente = substr($linha, 60, 20);
	$sequencia = substr($linha, 80, 9);
	$codigo_adquirente = substr($linha, 89, 2);
	$versao_layout = substr($linha, 91, 25);
	$reservado = substr($linha, 116, 284);
	$integracoes_id = 2;

	$inserir = "INSERT INTO header(tipo, data_criacao, hora_criacao,
				 data_referencia, versao_arquivo, estabelecimento,
				 cnpj, adquirente, sequencia, codigo_adquirente, versao_layout,
				 reservado, integracoes_id)
				 VALUES ('$tipo', '$data_criacao', '$hora_criacao', '$data_referencia',
				 '$versao_arquivo', '$estabelecimento', '$cnpj', '$adquirente', '$sequencia',
				 '$codigo_adquirente', '$versao_layout', '$reservado', $integracoes_id) ";

	$query = mysqli_query($conexao, $inserir) or die("Cabecalho".mysqli_error($conexao));
}

function cabecalhoTivit($linha, $pdo, $conexao, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setEstabelecimento(substr($linha, 1,10));
	$coluna->setDataCriacao(substr($linha, 11,8));
	$coluna->setDataInicial(substr($linha, 19,8));
	$coluna->setDataFinal(substr($linha, 27,8));
	$coluna->setSequencia(substr($linha, 35,7));
	$coluna->SetAdquirente(substr($linha, 42,5));
	$coluna->setOpcaoExtrato(substr($linha, 47,2));
	$coluna->setVan(substr($linha, 49,1));
	$coluna->setCaixaPostal(substr($linha, 50,20));
	$coluna->setVersaoLayout(substr($linha, 70,3));
	$coluna->setReservado(substr($linha, 73,177));

	inserirCabacalhoTivit($pdo, $conexao, $coluna);
	
}
