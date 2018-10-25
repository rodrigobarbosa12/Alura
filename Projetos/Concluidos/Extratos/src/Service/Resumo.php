<?php

	function resumoVendasGetNet($linha, $pdo, $coluna)
	{
		$coluna->setTipo(substr($linha, 0,1));
		$coluna->setCodigoComercial(substr($linha, 1,15));
		$coluna->setCodigoProduto(substr($linha, 16,2));
		$coluna->setCaptura(substr($linha, 18,3));
		$coluna->setNumeroRv(substr($linha, 21,9));
		$coluna->setDataRv(convertData(substr($linha, 30,8)));
		$coluna->setDataPagamentoRv(convertData(substr($linha, 38,8)));
		$coluna->setBanco(substr($linha, 46,3));
		$coluna->setAgencia(substr($linha, 49,6));
		$coluna->setContaCorrente(substr($linha, 55,11));
		$coluna->setCvAceitos(substr($linha, 66,9));
		$coluna->setCvRejeitados(substr($linha, 75,9));
		$coluna->setValorBruto(substr($linha, 84,12));
		$coluna->setValorLiquido(substr($linha, 96,12));
		$coluna->setTarifa(substr($linha, 108,12));
		$coluna->setTaxaDesconto(substr($linha, 120,12));
		$coluna->setRejeitado(substr($linha, 132,12));
		$coluna->setCredito(substr($linha, 144,12));
		$coluna->setEncargos(substr($linha, 156,12));
		$coluna->setTipoPagamento(substr($linha, 168,2));
		$coluna->setParcelaRv(substr($linha, 170,2));
		$coluna->setQuantidadeParcelasRv(substr($linha, 173,2));
		$coluna->setCodigoEstabelecimento(substr($linha, 174,15));
		$coluna->setOperacaoAntecipacao(substr($linha, 189,15));
		$coluna->setDataVencimentoRv(convertData(substr($linha, 204,8)));
		$coluna->setCustoOperacao(substr($linha, 212,12));
		$coluna->setLiquidoRvAntecipado(substr($linha, 224,12));
		$coluna->setControleCobranca(substr($linha, 236,18)); //Fora do intervalo
		$coluna->setLiquidoCobranca(substr($linha, 254,12));
		$coluna->setIdCompensacao(substr($linha, 266,15));
		$coluna->setMoeda(substr($linha, 281,3));
		$coluna->setBaixaCobrancaServico(substr($linha, 284,1));
		$coluna->setSinalTransacao(substr($linha, 285,1));
		$coluna->setReservado(substr($linha, 286,144));

		inserirResumoGetNet($pdo, $coluna);
	}


	function resumoVendasTivt($linha, $pdo, $coluna)
	{
		$coluna->setTipo(substr($linha, 0,1));
		$coluna->setCodigoComercial(substr($linha, 1,10));
		$coluna->setNumeroRv(substr($linha, 11,7));
		$coluna->setParcelaRv(substr($linha, 18,2));
		$coluna->setFiller(substr($linha, 20,1));
		$coluna->setQuantidadeParcelasRv(substr($linha, 21,2));
		$coluna->setTipoTransacao(substr($linha, 23,2));
		$coluna->setDataRv(convertData(substr($linha, 25,6)));
		$coluna->setDataPagamentoRv(convertData(substr($linha, 31,6)));
		$coluna->setDataEnvio(convertData(substr($linha, 37,6)));
		$coluna->setSinalBruto(substr($linha, 43,1));
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
		$coluna->setDataTransacao(convertData(substr($linha, 139,6)));
		$coluna->setTipoAjuste(substr($linha, 145,2));
		$coluna->setValorSaque(substr($linha, 147,13));
		$coluna->setIdAntecipacao(substr($linha, 160,1));
		$coluna->setOperacaoAntecipacao(substr($linha, 161,9));
		$coluna->setSinalBrutoAntecipacao(substr($linha, 170,1));
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

		inserirResumoTivit($pdo, $coluna);
	}
