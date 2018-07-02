<?php


function debitosAntecipados($linha, $pdo, $conexao, $coluna)
{

	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setCodigoComercial(substr($linha, 1,10));
	$coluna->setNumeroRoOriginal(substr($linha, 11,22);
	$coluna->setNumeroRoAntecipado(substr($linha, 33,7);
	$coluna->setDataPagamentoRo(substr($linha, 40,8));
	$coluna->setSinalRoAntecipado(substr($linha, 48,1));
	$coluna->setValorRoAntecipado(substr($linha, 59,13);
	$coluna->setOriginouAjuste(substr($linha, 62,22));
	$coluna->setNumeroRoDebito(substr($linha, 84,7));
	$coluna->setDataPagamentoAjuste(substr($linha, 91,8));
	$coluna->setSinalAjusteDebito(substr($linha, 99,1));
	$coluna->setValorAjusteDebito(substr($linha, 100,13));
	$coluna->setSinalCompensado(substr($linha, 113,1));
	$coluna->setvalorCompensado(substr($linha, 114,13));
	$coluna->setSinalSaldoAntecipado(substr($linha, 127,1));
	$coluna->setValorSaldoAntecipado(substr($linha, 129,13));
	$coluna->setReservado(substr($linha, 141,109));

	inserirDebitosAntecipacaoTivit($pdo, $conexao, $coluna);

	// $inserir = "INSERT INTO debitos_antecipados (tipo, codigo_comercial, numero_ro_original, numero_ro_antecipado, data_pagamento_ro, sinal_ro_antecipado, valor_ro_antecipado, originou_ajuste, numero_ro_debito, data_pagamento_ajuste, sinal_ajuste_debito, valor_ajuste_debito, sinal_compensado, valor_compensado, sinal_saldo_antecipado, valor_saldo_antecipado, reservado)
	// values ('$tipo', '$codigo_comercial', '$numero_ro_original', $numero_ro_antecipado, '$data_pagamento_ro', '$sinal_ro_antecipado', $valor_ro_antecipado, '$originou_ajuste', $numero_ro_debito, '$data_pagamento_ajuste', '$sinal_ajuste_debito', $valor_ajuste_debito, '$sinal_compensado', $valor_compensado, '$sinal_saldo_antecipado', $valor_saldo_antecipado, '$reservado')";

	// $query = mysqli_query($conexao, $inserir) or die("Debitos antecipados".mysqli_error($conexao));
}
