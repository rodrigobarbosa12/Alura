<?php 
require_once("conciliacao.php");
require_once("convertData.php");


function detalhecomprovanteVendas($linha, $conexao)
{
	$resumo = substr($linha,0,1);
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

	$inserir = "INSERT INTO detalhe_comprovante (codigo_comercial, numero_rv, nsu, data_transacao, hora_transacao, numero_cartao, valor_transacao, valor_saque, taxa_embarque, parcelas, parcela_cv, valor_parcela, data_pagamento, autorizacao, captura, status, centralizador_pagamentos, codigo_terminal, moeda, emissor, sinal_transacao, carteira, reservado) 
	VALUES ('$codigo_comercial', '$numero_rv', '$nsu, $data_transacao', '$hora_transacao', '$numero_cartao', '$valor_transacao', '$valor_saque', '$taxa_embarque', '$parcelas', '$parcela_cv', '$valor_parcela', '$data_pagamento', '$autorizacao', '$captura', '$status', '$centralizador_pagamentos', '$codigo_terminal', '$moeda', '$emissor', '$sinal_transacao', '$carteira', '$reservado')";
	$query = mysqli_query($conexao, $inserir) or die("Comprovante de vendas ".mysqli_error($conexao));
}
