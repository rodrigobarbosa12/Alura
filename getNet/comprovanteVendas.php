<?php


function comprovanteVendasGetNet($linha, $conexao)
{
	$tipo = substr($linha,0,1);
	$codigo_comercial = substr($linha,1,15);
	$numero_rv = substr($linha,16,9);
	$nsu = substr($linha,25,12);
	$data_transacao = convertData(substr($linha,37,8));
	$hora_transacao = convertTime(substr($linha,45,6));
	$numero_cartao = substr($linha,51,19);
	$valor_transacao = substr($linha,71,12);
	$valor_saque = substr($linha,82,12);
	$taxa_embarque = substr($linha,94,12);
	$parcelas = substr($linha,106,2);
	$parcela_cv = substr($linha,108,2);
	$valor_parcela = substr($linha,110,12);
	$data_pagamento = convertData(substr($linha,122,8));
	$autorizacao = substr($linha,130,10);
	$captura = substr($linha,140,3);
	$status = substr($linha,143,1);
	$centralizador_pagamentos = substr($linha,144,15);
	$codigo_terminal = substr($linha,159,8);
	$moeda = substr($linha,167,3);
	$emissor = substr($linha,170,1);
	$sinal_transacao = substr($linha,171,1);
	$carteira = substr($linha,172,3);
	$reservado = substr($linha,175,224);
	$integracoes_id = 2;

	$inserir = "INSERT INTO detalhe_comprovante (tipo, codigo_comercial, numero_rv, nsu, data_transacao, hora_transacao, numero_cartao, valor_transacao, valor_saque, taxa_embarque, parcelas, parcela_cv, valor_parcela, data_pagamento, autorizacao, captura, status, centralizador_pagamentos, codigo_terminal, moeda, emissor, sinal_transacao, carteira, reservado, integracoes_id)
	VALUES ('$tipo', '$codigo_comercial', $numero_rv, '$nsu', '$data_transacao', $hora_transacao, '$numero_cartao', $valor_transacao, $valor_saque, $taxa_embarque, $parcelas, $parcela_cv, $valor_parcela, '$data_pagamento', '$autorizacao', '$captura', '$status', '$centralizador_pagamentos', '$codigo_terminal', $moeda, '$emissor', '$sinal_transacao', '$carteira', '$reservado', $integracoes_id)";

	$query = mysqli_query($conexao, $inserir) or die("Comprovante de vendas ".mysqli_error($conexao));
}


function comprovanteVendasTivt($linha, $pdo, $conexao, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setCodigoComercial(substr($linha, 1,10));
	$coluna->setNumeroRv(substr($linha, 11,7));
	$coluna->setNumeroCartao(substr($linha, 18,19));
	$coluna->setDataTransacao(substr($linha, 37,8));
	$coluna->setSinalCompraParcelada(substr($linha, 45,1));
	$coluna->setCompraParcelada(substr($linha, 46,13));
	$coluna->setParcelaCv(substr($linha, 59,2));
	$coluna->setParcelas(substr($linha, 61,2));
	$coluna->setMotivoRejeicao(substr($linha, 63,3));
	$coluna->setAutorizacao(substr($linha, 66,6));
	$coluna->setTid(substr($linha, 72,20));
	$coluna->setNsu(substr($linha, 92,6));
	$coluna->setValorTransacao(substr($linha, 98,13));
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

	inserirComprovanteTivit($pdo, $conexao, $coluna);

}
