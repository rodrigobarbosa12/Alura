<?php

function cabecalhoGetNet($linha, $pdo, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setDataCriacao(convertData(substr($linha, 1,8)));
	$coluna->setHoraCriacao(substr($linha, 9,6));
	$coluna->setDataReferencia(convertData(substr($linha, 15,8)));
	$coluna->setVersaoArquivo(substr($linha, 23,8));
	$coluna->setEstabelecimento(substr($linha, 31,15));
	$coluna->setCnpj(substr($linha, 46,14));
	$coluna->setAdquirente(substr($linha, 60,20));
	$coluna->setSequencia(substr($linha, 80,9));
	$coluna->setCodigoAdquirente(substr($linha, 89,2));
	$coluna->setVersaoLayout(substr($linha, 91,25));
	$coluna->setReservado(substr($linha, 116,284));

	inserirCabecalhoGetNet($pdo, $coluna);
}

function cabecalhoTivit($linha, $pdo, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setEstabelecimento(substr($linha, 1,10));
	$coluna->setDataCriacao(convertData(substr($linha, 11,8)));
	$coluna->setDataInicial(convertData(substr($linha, 19,8)));
	$coluna->setDataFinal(convertData(substr($linha, 27,8)));
	$coluna->setSequencia(substr($linha, 35,7));
	$coluna->SetAdquirente(substr($linha, 42,5));
	$coluna->setOpcaoExtrato(substr($linha, 47,2));
	$coluna->setVan(substr($linha, 49,1));
	$coluna->setCaixaPostal(substr($linha, 50,20));
	$coluna->setVersaoLayout(substr($linha, 70,3));
	$coluna->setReservado(substr($linha, 73,177));

	inserirCabacalhoTivit($pdo, $coluna);
}
