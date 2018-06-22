<?php 
require_once("conciliacao.php");
require_once("convertData.php");

function detalheResumoVendas($linha, $conexao)
{
	$resumo = substr($linha, 0,1);
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
	$bruto = substr($linha, 84,12);
	$liquido = substr($linha, 96,12);
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
	$controle_cobranca = substr($linha, 236,18);
	$liquido_cobranca = substr($linha, 254,12);
	$id_compensacao = substr($linha, 266,15);
	$moeda = substr($linha, 281,3);
	$baixa_cobranca_servico = substr($linha, 284,1);
	$sinal_transacao = substr($linha, 285,1);
	$reservado = substr($linha, 286,144);

	$inserir = "INSERT INTO detalhe_resumo (codigo_comercial, codigo_produto, captura, numero_rv, data_rv, data_pagamento_rv, banco, agencia, conta_corrente, cv_aceitos, cv_rejeitados, bruto, liquido, tarifa, taxa_desconto, rejeitado, credito, encargos, tipo_pagamento, parcela_rv, quantidade_parcelas_rv, codigo_estabelecimento, operacao_antecipacao, data_vencimento_rv, custo_operacao, liquido_rv_antecipado, controle_cobranca, liquido_cobranca, id_compensacao, moeda, baixa_cobranca_servico, sinal_transacao, reservado) 
	VALUES ('$codigo_comercial', '$codigo_produto', '$captura', $numero_rv, '$data_rv', '$data_pagamento_rv', $banco, $agencia, $conta_corrente, $cv_aceitos, $cv_rejeitados, $bruto, $liquido, $tarifa, $taxa_desconto, $rejeitado, $credito, $encargos, '$tipo_pagamento', $parcela_rv, $quantidade_parcelas_rv, '$codigo_estabelecimento', $operacao_antecipacao, '$data_vencimento_rv', $custo_operacao, $liquido_rv_antecipado, $controle_cobranca, $liquido_cobranca, $id_compensacao, $moeda, '$baixa_cobranca_servico', '$sinal_transacao', '$reservado')";
	$query = mysqli_query($conexao, $inserir) or die ("Resumo de vendas ".mysqli_error($conexao));
}
