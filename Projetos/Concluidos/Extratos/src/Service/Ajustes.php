<?php

	function ajustesGetNet($linha, $pdo, $coluna)
	{
			$coluna->setTipo(substr($linha, 0,1));
			$coluna->setCodigoComercial(substr($linha, 2,15));
			$coluna->setRvAjustado(substr($linha, 16,9));
			$coluna->setDataRv(convertData(substr($linha, 25,8)));
			$coluna->setDataPagamentoRv(convertData(substr($linha, 33,8)));
			$coluna->setIdentificadorAjuste(substr($linha, 41,20)); //Fora Do intervalo
			$coluna->setBrancos(substr($linha, 61,1));
			$coluna->setSinalValorAjuste(substr($linha, 62,1));
			$coluna->setValorAjuste(substr($linha, 63,12));
			$coluna->setMotivoAjuste(substr($linha, 75,2));
			$coluna->setDataCarta(convertData(substr($linha, 77,8)));
			$coluna->setNumeroCartao(substr($linha, 85,19));
			$coluna->setRvOriginal(substr($linha, 104,9));
			$coluna->setNsuAdquirente(substr($linha, 113,12));
			$coluna->setDataTransacaoOriginal(convertData(substr($linha, 125,8)));
			$coluna->setIndicadorTipoPagamento(substr($linha, 133,2));
			$coluna->setNumeroTerminal(substr($linha, 135,8));
			$coluna->setDataPagamento(convertData(substr($linha, 143,8)));
			$coluna->setMoeda(substr($linha, 151,3));
			$coluna->setReservado(substr($linha, 154,246));

			inserirAjustesGetNet($pdo, $coluna);
	}

