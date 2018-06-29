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


function comprovanteVendasTivt($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 1,10);
	$numero_rv = substr($linha, 11,7);
	$numero_cartao = substr($linha, 18,19);
	$data_transacao = substr($linha, 37,8);
	$sinal_compra_parcela = substr($linha, 45,1);
	$compra_parcela = substr($linha, 46,13);
	$parcela_cv = substr($linha, 59,2);
	$parcelas = substr($linha, 61,2);
	$motivo_rejeicao = isNull(substr($linha, 63,3));
	$autorizacao = substr($linha, 66,6);
	$tid = substr($linha, 72,20);
	$nsu = substr($linha, 92,6);
	$valor_transacao = substr($linha, 98,13);
	$digitos_cartao = substr($linha, 111,2);
	$total_parcelado = substr($linha, 113,13);
	$proxima_parcela = substr($linha, 128,13);
	$nota_fiscal = substr($linha, 139,9);
	$emissor = substr($linha, 148,4);
	$codigo_terminal = substr($linha, 152,8);
	$taxa_embarque = substr($linha, 160,2);
	$codigo_referencia = substr($linha, 162,20);
	$hora_transacao = substr($linha, 182,6);
	$id_transacao = substr($linha, 188,29);
	$id_cielo_promo = substr($linha, 217,1);
	$reservado = substr($linha, 218,32);

	$inserir = "INSERT INTO detalhe_comprovante (tipo, codigo_comercial, numero_rv, numero_cartao, data_transacao, sinal_compra_parcela, compra_parcela, parcela_cv, parcelas, motivo_rejeicao, autorizacao, tid, nsu, valor_transacao, digitos_cartao, total_parcelado, proxima_parcela, nota_fiscal, emissor, codigo_terminal, taxa_embarque, codigo_referencia, hora_transacao, id_transacao, id_cielo_promo, reservado)
	values ('$tipo', '$codigo_comercial', $numero_rv, '$numero_cartao', '$data_transacao', '$sinal_compra_parcela', $compra_parcela, $parcela_cv, $parcelas,
	'$motivo_rejeicao',


	'$autorizacao', '$tid', '$nsu', $valor_transacao, $digitos_cartao, $total_parcelado, $proxima_parcela, $nota_fiscal, '$emissor', '$codigo_terminal', '$taxa_embarque', '$codigo_referencia', $hora_transacao, $id_transacao, '$id_cielo_promo', '$reservado')";

	$query = mysqli_query($conexao, $inserir) or die("Detalhe comprovante".mysqli_error($conexao));
}