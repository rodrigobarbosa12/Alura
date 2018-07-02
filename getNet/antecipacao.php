<?php

function antecipacaoGetNet($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 1,15);
	$data_operacao = convertData(substr($linha, 16,8));
	$data_credito = convertData(substr($linha, 24,8));
	$numero_operacao = substr($linha, 32,15);
	$antecipacao_bruto = substr($linha, 47,12);
	$taxa_antecipacao = substr($linha, 59,12);
	$liquido_antecipacao = substr($linha, 71,12);
	$texa_mes_operacao = substr($linha, 83,11);
	$centralizador_pagamentos = substr($linha, 94,15);
	$banco_domicilio = substr($linha, 109,3);
	$agencia_domicilio = substr($linha, 112,6);
	$conta_domicilio = substr($linha, 118,11);
	$canal_antecipacao = substr($linha, 129,3);
	$tipo_pagamento = substr($linha, 132,2);
	$reservado = substr($linha, 134,266);
	$integracoes_id = 2;

	$inserir = "INSERT INTO detalhe_antecipacao (tipo, 'codigo_comercial', data_operacao, data_credito, numero_operacao, antecipacao_bruto, taxa_antecipacao, liquido_antecipacao, liquido_antecipacao, texa_mes_operacao, centralizador_pagamentos, banco_domicilio, agencia_domicilio, conta_domicilio, canal_antecipacao, tipo_pagamento, reservado, integracoes_id)
	VALUES ('$tipo', $codigo_comercial, $data_operacao, $data_credito, $numero_operacao, $antecipacao_bruto, $taxa_antecipacao, $liquido_antecipacao, $texa_mes_operacao, '$centralizador_pagamentos', $banco_domicilio, $agencia_domicilio, $conta_domicilio, '$canal_antecipacao', '$tipo_pagamento', '$reservado', $integracoes_id)";

	$query = mysqli_query($conexao, $inserir) or die('Antecipacao'.mysqli_error($conexao));
}


function antecipacaoTivit($linha, $pdo, $conexao, $coluna)
{
	$coluna->getTipo(substr($linha, 0,1));
	$coluna->getCodigoComercial(substr($linha, 1,10);)
	$coluna->getNumeroOperacao(substr($linha, 11,9));
	$coluna->getDataCredito(substr($linha, 21,8));
	$coluna->getSinalBrutoAvista(substr($linha, 28,1));
	$coluna->getValorBrutoAvista(substr($linha, 29,13));
	$coluna->getSinalBrutoParcelado(substr($linha, 42,1));
	$coluna->getValorBrutoParcelado(substr($linha, 43,13));
	$coluna->getSinalBrutoPre(substr($linha, 56,1));
	$coluna->getValorBrutoPre(substr($linha, 57,13));
	$coluna->getSinalBrutoTotal(substr($linha, 70,1));
	$coluna->getValorBrutoTotal(substr($linha, 71,13)_;
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
	
	inserirAntecipacaoTivit($pdo, $conexao, $coluna)


	// $inserir = "INSERT INTO detalhe_antecipacao (tipo, codigo_comercial, numero_operacao, data_credito, sinal_bruto_avista, valor_bruto_avista, sinal_bruto_parcelado, valor_bruto_parcelado, sinal_bruto_pre, valor_bruto_pre, sinal_bruto_total, valor_bruto_total, sinal_liquido_avista, valor_liquido_avista, sinal_liquido_parcelado, valor_liquido_parcelado, sinal_liquido_pre, valor_liquido_pre, sinal_liquido_total, valor_liquido_total, taxa_antecipacao, banco_domicilio, agencia_domicilio, conta_domicilio, sinal_liquido_antecipacao, liquido_antecipacao, reservado)
	// values ('$tipo', '$codigo_comercial', $numero_operacao, '$data_credito', '$sinal_bruto_avista', $valor_bruto_avista, '$sinal_bruto_parcelado', $valor_bruto_parcelado, '$sinal_bruto_pre', $valor_bruto_pre, '$sinal_bruto_total', $valor_bruto_total, '$sinal_liquido_avista', $valor_liquido_avista, '$sinal_liquido_parcelado', $valor_liquido_parcelado, '$sinal_liquido_pre', $valor_liquido_pre, '$sinal_liquido_total', $valor_liquido_total, $taxa_antecipacao, $banco_domicilio, $agencia_domicilio, '$conta_domicilio', '$sinal_liquido_antecipacao', $liquido_antecipacao, '$reservado')";

	// $query = mysqli_query($conexao, $inserir) or die("Detalhe antecipação".mysqli_error($conexao));
}
