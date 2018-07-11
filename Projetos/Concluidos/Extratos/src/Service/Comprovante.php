<?php

	function comprovanteVendasGetNet($linha, $pdo, $coluna)
	{
		$coluna->setTipo(substr($linha,0,1));
		$coluna->setCodigoComercial(substr($linha,1,15));
		$coluna->setNumeroRv(substr($linha,16,9));
		$coluna->setNsu(substr($linha,25,12));
		$coluna->setDataTransacao(convertData(substr($linha,37,8)));
		$coluna->setHoraTransacao(substr($linha,45,6));
		$coluna->setNumeroCartao(substr($linha,51,19));
		$coluna->setValorTransacao(substr($linha,70,12));
		$coluna->setValorSaque(substr($linha,82,12));
		$coluna->setTaxaEmbarque(substr($linha,94,12));
		$coluna->setParcelas(substr($linha,106,2));
		$coluna->setParcelaCv(substr($linha,108,2));
		$coluna->setValorParcela(substr($linha,110,12));
		$coluna->setDataPagamento(convertData(substr($linha,122,8)));
		$coluna->setAutorizacao(substr($linha,130,10));
		$coluna->setCaptura(substr($linha,140,3));
		$coluna->setStatus(substr($linha,143,1));
		$coluna->setCentralizadorPagamentos(substr($linha,144,15));
		$coluna->setCodigoTerminal(substr($linha,159,8));
		$coluna->setMoeda(substr($linha,167,3));
		$coluna->setEmissor(substr($linha,170,1));
		$coluna->setSinalTransacao(substr($linha,171,1));
		$coluna->setCarteira(substr($linha,172,3));
		$coluna->setReservado(substr($linha,175,224));

		inserirComprovanteGetNet($pdo, $coluna);
	}

	function comprovanteVendasTivt($linha, $pdo, $coluna)
	{
		$coluna->setTipo(substr($linha, 0,1));
		$coluna->setCodigoComercial(substr($linha, 1,10));
		$coluna->setNumeroRv(substr($linha, 11,7));
		$coluna->setNumeroCartao(substr($linha, 18,19));
		$coluna->setDataTransacao(convertData(substr($linha, 37,8)));
		$coluna->setSinalCompraParcela(substr($linha, 45,1));
		$coluna->setCompraParcela(substr($linha, 46,13));
		$coluna->setParcelaCv(substr($linha, 59,2));
		$coluna->setParcelas(substr($linha, 61,2));
		$coluna->setMotivoRejeicao(substr($linha, 63,3));
		$coluna->setAutorizacao(substr($linha, 66,6));
		$coluna->setTid(substr($linha, 72,20));
		$coluna->setNsu(substr($linha, 92,6));
		$coluna->setValorTransacaoSaque(substr($linha, 98,13));
		$coluna->setDigitosCartao(substr($linha, 111,2));
		$coluna->setTotalParcelado(substr($linha, 113,13));
		$coluna->setProximaParcela(substr($linha, 128,13));
		$coluna->setNotaFiscal(substr($linha, 139,9));
		$coluna->setemissor(substr($linha, 148,4));
		$coluna->setCodigoTerminal(substr($linha, 152,8));
		$coluna->setTaxaEmbarque(substr($linha, 160,2));
		$coluna->setCodigoReferencia(substr($linha, 162,20));
		$coluna->setHoraTransacao(substr($linha, 182,6));
		$coluna->setIdTransacao(substr($linha, 188,29));
		$coluna->setIdCieloPromo(substr($linha, 217,1));
		$coluna->setReservado(substr($linha, 218,32));

		inserirComprovanteTivit($pdo, $coluna);
	}
