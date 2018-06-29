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


function antecipacaoTivit($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 1,10);
	$numero_operacao = substr($linha, 11,9);
	$data_credito = substr($linha, 21,8);
	$sinal_bruto_avista = substr($linha, 28,1);
	$valor_bruto_avista = substr($linha, 29,13);
	$sinal_bruto_parcelado = substr($linha, 42,1);
	$valor_bruto_parcelado = substr($linha, 43,13);
	$sinal_bruto_pre = substr($linha, 56,1);
	$valor_bruto_pre = substr($linha, 57,13);
	$sinal_bruto_total = substr($linha, 70,1);
	$valor_bruto_total = substr($linha, 71,13);
	$sinal_liquido_avista = substr($linha, 84,1);
	$valor_liquido_avista = substr($linha, 85,13);
	$sinal_liquido_parcelado = substr($linha, 98,1);
	$valor_liquido_parcelado = substr($linha, 99,13);
	$sinal_liquido_pre = substr($linha, 112,1);
	$valor_liquido_pre = substr($linha, 113,13);
	$sinal_liquido_total = substr($linha, 126,1);
	$valor_liquido_total = substr($linha, 127,13);
	$taxa_antecipacao = substr($linha, 140,5);
	$banco_domicilio = substr($linha, 145,4);
	$agencia_domicilio = substr($linha, 149,5);
	$conta_domicilio = substr($linha, 154,14);
	$sinal_liquido_antecipacao = substr($linha, 168,1);
	$liquido_antecipacao = substr($linha, 179,13);
	$reservado = substr($linha, 162,68);

	$inserir = "INSERT INTO detalhe_antecipacao (tipo, codigo_comercial, numero_operacao, data_credito, sinal_bruto_avista, valor_bruto_avista, sinal_bruto_parcelado, valor_bruto_parcelado, sinal_bruto_pre, valor_bruto_pre, sinal_bruto_total, valor_bruto_total, sinal_liquido_avista, valor_liquido_avista, sinal_liquido_parcelado, valor_liquido_parcelado, sinal_liquido_pre, valor_liquido_pre, sinal_liquido_total, valor_liquido_total, taxa_antecipacao, banco_domicilio, agencia_domicilio, conta_domicilio, sinal_liquido_antecipacao, liquido_antecipacao, reservado)
	values ('$tipo', '$codigo_comercial', $numero_operacao, '$data_credito', '$sinal_bruto_avista', $valor_bruto_avista, '$sinal_bruto_parcelado', $valor_bruto_parcelado, '$sinal_bruto_pre', $valor_bruto_pre, '$sinal_bruto_total', $valor_bruto_total, '$sinal_liquido_avista', $valor_liquido_avista, '$sinal_liquido_parcelado', $valor_liquido_parcelado, '$sinal_liquido_pre', $valor_liquido_pre, '$sinal_liquido_total', $valor_liquido_total, $taxa_antecipacao, $banco_domicilio, $agencia_domicilio, '$conta_domicilio', '$sinal_liquido_antecipacao', $liquido_antecipacao, '$reservado')";

	$query = mysqli_query($conexao, $inserir) or die("Detalhe antecipação".mysqli_error($conexao));
}
