<?php

function antecipacaoGetNet($linha, $pdo, $coluna)
{
	$coluna->setTipo(substr($coluna->setlinha, 0,1));
	$coluna->setCodigoComercial(substr($coluna->setlinha, 1,15));
	$coluna->setDataOperacao(convertData(substr($coluna->setlinha, 16,8)));
	$coluna->setDataCredito(convertData(substr($coluna->setlinha, 24,8)));
	$coluna->setNumeroOperacao(substr($coluna->setlinha, 32,15));
	$coluna->setAntecipacaoBruto(substr($coluna->setlinha, 47,12));
	$coluna->setTaxaAntecipacao(substr($coluna->setlinha, 59,12));
	$coluna->setLiquidoAntecipacao(substr($coluna->setlinha, 71,12));
	$coluna->setTexaMesOperacao(substr($coluna->setlinha, 83,11));
	$coluna->setCentralizadorPagamentos(substr($coluna->setlinha, 94,15));
	$coluna->setBancoDomicilio(substr($coluna->setlinha, 109,3));
	$coluna->setAgenciaDomicilio(substr($coluna->setlinha, 112,6));
	$coluna->setContaDomicilio(substr($coluna->setlinha, 118,11));
	$coluna->setCanalAntecipacao(substr($coluna->setlinha, 129,3));
	$coluna->setTipoPagamento(substr($coluna->setlinha, 132,2));
	$coluna->setReservado(substr($coluna->setlinha, 134,266));

	inserirAntecipacaoGetNet($pdo, $coluna);

	// $inserir = "INSERT INTO detalhe_antecipacao (tipo, 'codigo_comercial', data_operacao, data_credito, numero_operacao, antecipacao_bruto, taxa_antecipacao, liquido_antecipacao, liquido_antecipacao, texa_mes_operacao, centralizador_pagamentos, banco_domicilio, agencia_domicilio, conta_domicilio, canal_antecipacao, tipo_pagamento, reservado, integracoes_id)
	// VALUES ('$tipo', $codigo_comercial, $data_operacao, $data_credito, $numero_operacao, $antecipacao_bruto, $taxa_antecipacao, $liquido_antecipacao, $texa_mes_operacao, '$centralizador_pagamentos', $banco_domicilio, $agencia_domicilio, $conta_domicilio, '$canal_antecipacao', '$tipo_pagamento', '$reservado', $integracoes_id)";

	// $query = mysqli_query($conexao, $inserir) or die('Antecipacao'.mysqli_error($conexao));
}


function antecipacaoTivit($linha, $pdo, $coluna)
{
	$coluna->getTipo(substr($linha, 0,1));
	$coluna->getCodigoComercial(substr($linha, 1,10));
	$coluna->getNumeroOperacao(substr($linha, 11,9));
	$coluna->getDataCredito(convertData(substr($linha, 21,8)));
	$coluna->getSinalBrutoAvista(substr($linha, 28,1));
	$coluna->getValorBrutoAvista(substr($linha, 29,13));
	$coluna->getSinalBrutoParcelado(substr($linha, 42,1));
	$coluna->getValorBrutoParcelado(substr($linha, 43,13));
	$coluna->getSinalBrutoPre(substr($linha, 56,1));
	$coluna->getValorBrutoPre(substr($linha, 57,13));
	$coluna->getSinalBrutoTotal(substr($linha, 70,1));
	$coluna->getValorBrutoTotal(substr($linha, 71,13));
	$coluna->getSinalLiquidoAvista(substr($linha, 84,1));
	$coluna->getValorLiquidoAvista(substr($linha, 85,13));
	$coluna->getSinalLiquidoParcelado(substr($linha, 98,1));
	$coluna->getValorLiquidoParcelado(substr($linha, 99,13));
	$coluna->getsSnalLiquidoPre(ubstr($linha, 112,1));
	$coluna->getValorLiquidoPre(substr($linha, 113,13));
	$coluna->getSinalLiquidoTotal(substr($linha, 126,1));
	$coluna->getValorLiquidoTotal(substr($linha, 127,13));
	$coluna->getTaxaAntecipacao(substr($linha, 140,5));
	$coluna->getBancoDomicilio(substr($linha, 145,4));
	$coluna->getAgenciaDomicilio(substr($linha, 149,5));
	$coluna->getContaDomicilio(substr($linha, 154,14));
	$coluna->getSinalLiquidoAntecipacao(substr($linha, 168,1));
	$coluna->getLiquidoAntecipacao(substr($linha, 179,13));
	$coluna->getReservado(substr($linha, 162,68));

	inserirAntecipacaoTivit($pdo, $coluna);
}
