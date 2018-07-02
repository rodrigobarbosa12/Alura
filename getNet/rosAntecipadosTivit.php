<?php


function rosAntecipados($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 1,10);
	$numero_operacao = substr($linha, 11,9);
	$data_vencimento_ro = substr($linha, 20,8);
	$numero_ro_antecipado = substr($linha, 28,7);
	$parcela_antecipada = substr($linha, 35,2);
	$total_parcelas = substr($linha, 37,2);
	$sinal_bruto_original = substr($linha, 39,1);
	$valor_bruto_original = substr($linha, 40,13);
	$sinal_liquido_original = substr($linha, 53,1);
	$valor_liquido_original = substr($linha, 54,13);
	$sinal_bruto_antecipacao = substr($linha, 67,1);
	$valor_bruto_antecipacao = substr($linha, 68,13);
	$sinal_liquido_antecipacao = substr($linha, 81,1);
	$valor_liquido_antecipacao = substr($linha, 82,13);
	$bandeira = substr($linha, 95,3);
	$numero_ro = substr($linha, 98,22);
	$reservado = substr($linha, 120,130);

	$inserir = "INSERT INTO ros_antecipados (tipo, codigo_comercial, numero_operacao, data_vencimento_ro, numero_ro_antecipado, parcela_antecipada, total_parcelas, sinal_bruto_original, valor_bruto_original, sinal_liquido_original, valor_liquido_original, sinal_bruto_antecipacao, valor_bruto_antecipacao, sinal_liquido_antecipacao, valor_liquido_antecipacao, bandeira, numero_ro, revervado)
	values ('$tipo', '$codigo_comercial', $numero_operacao, '$data_vencimento_ro', $numero_ro_antecipado, $parcela_antecipada, $total_parcelas, '$sinal_bruto_original', $valor_bruto_original, '$sinal_liquido_original', $valor_liquido_original, '$sinal_bruto_antecipacao', $valor_bruto_antecipacao, '$sinal_liquido_antecipacao', $valor_liquido_antecipacao, $bandeira, '$numero_ro', '$reservado')";

	$query = mysqli_query($conexao, $inserir) or die("Ros antecipados".mysqli_error($conexao));
}
