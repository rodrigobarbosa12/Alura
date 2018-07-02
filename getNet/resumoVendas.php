<?php

function resumoVendasGetNet($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 1,15);
	$codigo_produto = substr($linha, 16,2);
	$captura = substr($linha, 18,3);
	$numero_rv = substr($linha, 21,9);
	$data_rv = convertData($data_rv = substr($linha, 30,8));
	$data_pagamento_rv = convertData(substr($linha, 38,8));
	$banco = substr($linha, 46,3);
	$agencia = substr($linha, 49,6);
	$conta_corrente = substr($linha, 55,11);
	$cv_aceitos = substr($linha, 66,9);
	$cv_rejeitados = substr($linha, 75,9);
	$valor_bruto = substr($linha, 84,12);
	$valor_liquido = substr($linha, 96,12);
	$tarifa = substr($linha, 108,12);
	$taxa_desconto = substr($linha, 120,12);
	$rejeitado = substr($linha, 132,12);
	$credito = substr($linha, 144,12);
	$encargos = substr($linha, 156,12);
	$tipo_pagamento = substr($linha, 168,2);
	$parcela_rv = substr($linha, 170,2);
	$quantidade_parcelas_rv = substr($linha, 173,2);
	$codigo_estabelecimento = substr($linha, 174,15);
	$operacao_antecipacao = substr($linha, 189,15);
	$data_vencimento_rv = convertData(substr($linha, 204,8));
	$custo_operacao = substr($linha, 212,12);
	$liquido_rv_antecipado = substr($linha, 224,12);
	$controle_cobranca = substr($linha, 236,18); //Fora do intervalo
	$liquido_cobranca = substr($linha, 254,12);
	$id_compensacao = substr($linha, 266,15);
	$moeda = substr($linha, 281,3);
	$baixa_cobranca_servico = substr($linha, 284,1);
	$sinal_transacao = substr($linha, 285,1);
	$reservado = substr($linha, 286,144);
	$integracoes_id = 2;

	if (!$data_vencimento_rv){
		$inserir = "INSERT INTO detalhe_resumo (tipo, codigo_comercial, codigo_produto, captura, numero_rv, data_rv, data_pagamento_rv, banco, agencia, conta_corrente, cv_aceitos, cv_rejeitados, valor_bruto, valor_liquido, tarifa, taxa_desconto, rejeitado, credito, encargos, tipo_pagamento, parcela_rv, quantidade_parcelas_rv, codigo_estabelecimento, operacao_antecipacao, custo_operacao, liquido_rv_antecipado, controle_cobranca, liquido_cobranca, id_compensacao, moeda, baixa_cobranca_servico, sinal_transacao, reservado, integracoes_id)
			VALUES ('$tipo', '$codigo_comercial', '$codigo_produto', '$captura', $numero_rv, '$data_rv', '$data_pagamento_rv', $banco, $agencia, $conta_corrente, $cv_aceitos, $cv_rejeitados, $valor_bruto, $valor_liquido, $tarifa, $taxa_desconto, $rejeitado, $credito, $encargos, '$tipo_pagamento', $parcela_rv, $quantidade_parcelas_rv, '$codigo_estabelecimento', $operacao_antecipacao, $custo_operacao, $liquido_rv_antecipado, $controle_cobranca, $liquido_cobranca, $id_compensacao, $moeda, '$baixa_cobranca_servico', '$sinal_transacao', '$reservado', $integracoes_id)";
	} else{
		$inserir = "INSERT INTO detalhe_resumo (tipo, codigo_comercial, codigo_produto, captura, numero_rv, data_rv, data_pagamento_rv, banco, agencia, conta_corrente, cv_aceitos, cv_rejeitados, valor_bruto, valor_liquido, tarifa, taxa_desconto, rejeitado, credito, encargos, tipo_pagamento, parcela_rv, quantidade_parcelas_rv, codigo_estabelecimento, operacao_antecipacao, data_vencimento_rv, custo_operacao, liquido_rv_antecipado, controle_cobranca, liquido_cobranca, id_compensacao, moeda, baixa_cobranca_servico, sinal_transacao, reservado, integracoes_id)
			VALUES ('$tipo', '$codigo_comercial', '$codigo_produto', '$captura', $numero_rv, '$data_rv', '$data_pagamento_rv', $banco, $agencia, $conta_corrente, $cv_aceitos, $cv_rejeitados, $valor_bruto, $valor_liquido, $tarifa, $taxa_desconto, $rejeitado, $credito, $encargos, '$tipo_pagamento', $parcela_rv, $quantidade_parcelas_rv, '$codigo_estabelecimento', $operacao_antecipacao, '$data_vencimento_rv', $custo_operacao, $liquido_rv_antecipado, $controle_cobranca, $liquido_cobranca, $id_compensacao, $moeda, '$baixa_cobranca_servico', '$sinal_transacao', '$reservado', $integracoes_id)";
	}

	$query = mysqli_query($conexao, $inserir) or die ("Resumo de vendas ".mysqli_error($conexao));
}


function resumoVendasTivt($extrato, $pdo, $conexao, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setCodigoComercial(substr($linha, 1,10));
	$coluna->setNumeroRv(substr($linha, 11,7));
	$coluna->setParcelaRv(substr($linha, 18,2));
	$coluna->setFiller(substr($linha, 20,1));
	$coluna->setQuantidadeParcelasRv(substr($linha, 21,2));
	$coluna->setTipoTransacao(substr($linha, 23,2));
	$coluna->setDataRv(substr($linha, 25,6));
	$coluna->setDataPagamentoRv(substr($linha, 31,6));
	$coluna->setDataEnvio(substr($linha, 37,6));
	$coluna->setSinalBruto(substr($linha, 43,1));
	$coluna->setValorBruto(substr($linha, 44,13));
	$coluna->setSinalComissao(substr($linha, 57,1));
	$coluna->setValorComissao(substr($linha, 58,13));
	$coluna->setSinalRejeitado(substr($linha, 71,1));
	$coluna->setValorRejeitado(substr($linha, 72,13));
	$coluna->setSinalLiquido(substr($linha, 85,1));
	$coluna->setValorLiquido(substr($linha, 86,13));
	$coluna->setBanco(substr($linha, 99,4));
	$coluna->setAgencia(substr($linha, 103,5));
	$coluna->setContaCorrente(substr($linha, 108,14));
	$coluna->setStatus(substr($linha, 122,2));
	$coluna->setCvAceitos(substr($linha, 124,6));
	$coluna->setCvRejeitados(substr($linha, 132,6));
	$coluna->setIdRevenda(substr($linha, 138,1));
	$coluna->setDataTransacao(substr($linha, 139,6));
	$coluna->setTipoAjuste(substr($linha, 145,2));
	$coluna->setValorSaque(substr($linha, 147,13));
	$coluna->setIdAntecipacao(substr($linha, 160,1));
	$coluna->setOperacaoAntecipacao(substr($linha, 161,9));
	$coluna->setSinalArutoAntecipacao(substr($linha, 170,1));
	$coluna->setBrutoAntecipacao(substr($linha, 171,13));
	$coluna->setBandeira(substr($linha, 184,3));
	$coluna->setNumeroUnicoRv(substr($linha, 187,22));
	$coluna->setTaxaComissao(substr($linha, 209,4));
	$coluna->setTarifa(substr($linha, 213,5));
	$coluna->setTaxaGarantia(substr($linha, 218,4));
	$coluna->setCaptura(substr($linha, 222,2));
	$coluna->setNumeroLogicoTerminal(substr($linha, 224,8));
	$coluna->setCodigoProduto(substr($linha, 232,3));
	$coluna->setEstabelecimento(substr($linha, 235,10));
	$coluna->setReservado(substr($linha, 245,5));

	inserirResumoTivit($pdo, $conexao, $coluna);

	// if (!$data_envio) {
	// 	$inserir = "INSERT INTO detalhe_resumo (tipo, codigo_comercial, numero_rv, parcela_rv, filler, quantidade_parcelas_rv, tipo_transacao, data_rv, data_pagamento_rv, sinal_bruto, valor_bruto, sinal_comissao, valor_comissao, sinal_rejeitado, valor_rejeitado, sinal_liquido, valor_liquido, banco, agencia, conta_corrente, status, cv_aceitos, cv_rejeitados, id_revenda, data_transacao, tipo_ajuste, valor_saque, id_antecipacao, operacao_antecipacao, sinal_bruto_antecipacao, bruto_antecipacao, bandeira, numero_unico_rv, taxa_comissao, tarifa, taxa_garantia, captura, numero_logico_terminal, codigo_produto, estabelecimento, reservado)
	// 		values ('$tipo', '$codigo_comercial', $numero_rv, '$parcela_rv', '$filler', '$quantidade_parcelas_rv', $tipo_transacao, '$data_rv', '$data_pagamento_rv', '$sinal_bruto', $valor_bruto, '$sinal_comissao', $valor_comissao, '$sinal_rejeitado', $valor_rejeitado, '$sinal_liquido', $valor_liquido, $banco, $agencia, '$conta_corrente', $status, $cv_aceitos, $cv_rejeitados, '$id_revenda', '$data_transacao', '$tipo_ajuste', $valor_saque, '$id_antecipacao', $operacao_antecipacao, '$sinal_bruto_antecipacao', $bruto_antecipacao, $bandeira, $numero_unico_rv, $taxa_comissao, $tarifa, $taxa_garantia, '$captura', $numero_logico_terminal, '$codigo_produto', $estabelecimento, '$reservado')";
	// } else {
	// 	$inserir = "INSERT INTO detalhe_resumo (tipo, codigo_comercial, numero_rv, parcela_rv, filler, quantidade_parcelas_rv, tipo_transacao, data_rv, data_pagamento_rv, data_envio, sinal_bruto, valor_bruto, sinal_comissao, valor_comissao, sinal_rejeitado, valor_rejeitado, sinal_liquido, valor_liquido, banco, agencia, conta_corrente, status, cv_aceitos, cv_rejeitados, id_revenda, data_transacao, tipo_ajuste, valor_saque, id_antecipacao, operacao_antecipacao, sinal_bruto_antecipacao, bruto_antecipacao, bandeira, numero_unico_rv, taxa_comissao, tarifa, taxa_garantia, captura, numero_logico_terminal, codigo_produto, estabelecimento, reservado)
	// 		values ('$tipo', '$codigo_comercial', $numero_rv, '$parcela_rv', '$filler', '$quantidade_parcelas_rv', $tipo_transacao, '$data_rv', '$data_pagamento_rv', $data_envio, '$sinal_bruto', $valor_bruto, '$sinal_comissao', $valor_comissao, '$sinal_rejeitado', $valor_rejeitado, '$sinal_liquido', $valor_liquido, $banco, $agencia, '$conta_corrente', $status, $cv_aceitos, $cv_rejeitados, '$id_revenda', '$data_transacao', '$tipo_ajuste', $valor_saque, '$id_antecipacao', $operacao_antecipacao, '$sinal_bruto_antecipacao', $bruto_antecipacao, $bandeira, $numero_unico_rv, $taxa_comissao, $tarifa, $taxa_garantia, '$captura', $numero_logico_terminal, '$codigo_produto', $estabelecimento, '$reservado')";
	// }

	// $query = mysqli_query($conexao, $inserir) or die("Detalhe resumo: ".mysqli_error($conexao));
}
