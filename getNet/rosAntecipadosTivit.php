<?php


function rosAntecipados($linha, $pdo, $conexao, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setCodigoComercial(substr($linha, 1,10));
	$coluna->setNumeroOperacao(substr($linha, 11,9));
	$coluna->setDataVencimentoRo(substr($linha, 20,8));
	$coluna->setNumeroRoAntecipado(substr($linha, 28,7));
	$coluna->setParcelaAntecipada(substr($linha, 35,2));
	$coluna->setTotalParcelas(substr($linha, 37,2));
	$coluna->setSinalBrutoOriginal(substr($linha, 39,1));
	$coluna->setValorBrutoOriginal(substr($linha, 40,13));
	$coluna->setSinalLiquidoOriginal(substr($linha, 53,1));
	$coluna->setValorLiquidoOriginal(substr($linha, 54,13));
	$coluna->setSinalBrutoAntecipacao(substr($linha, 67,1));
	$coluna->setValorBrutoAntecipacao(substr($linha, 68,13));
	$coluna->setSinalLiquidoAntecipacao(substr($linha, 81,1));
	$coluna->setValorLiquidoAntecipacao(substr($linha, 82,13));
	$coluna->setBandeira(substr($linha, 95,3));
	$coluna->setNumeroRo(substr($linha, 98,22));
	$coluna->setReservado(substr($linha, 120,130));

	inserirRosAntecipadosTivit($pdo, $conexao, $coluna);

	// $inserir = "INSERT INTO ros_antecipados (tipo, codigo_comercial, numero_operacao, data_vencimento_ro, numero_ro_antecipado, parcela_antecipada, total_parcelas, sinal_bruto_original, valor_bruto_original, sinal_liquido_original, valor_liquido_original, sinal_bruto_antecipacao, valor_bruto_antecipacao, sinal_liquido_antecipacao, valor_liquido_antecipacao, bandeira, numero_ro, revervado)
	// values ('$tipo', '$codigo_comercial', $numero_operacao, '$data_vencimento_ro', $numero_ro_antecipado, $parcela_antecipada, $total_parcelas, '$sinal_bruto_original', $valor_bruto_original, '$sinal_liquido_original', $valor_liquido_original, '$sinal_bruto_antecipacao', $valor_bruto_antecipacao, '$sinal_liquido_antecipacao', $valor_liquido_antecipacao, $bandeira, '$numero_ro', '$reservado')";

	// $query = mysqli_query($conexao, $inserir) or die("Ros antecipados".mysqli_error($conexao));
}
