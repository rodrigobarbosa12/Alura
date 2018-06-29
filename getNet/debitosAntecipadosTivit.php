<?php


function debitosAntecipados($linha, $conexao)
{

	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 1,10);
	$numero_ro_original = substr($linha, 11,22);
	$numero_ro_antecipado = substr($linha, 33,7);
	$data_pagamento_ro = substr($linha, 40,8);
	$sinal_ro_antecipado = substr($linha, 48,1);
	$valor_ro_antecipado = substr($linha, 59,13);
	$originou_ajuste = substr($linha, 62,22);
	$numero_ro_debito = substr($linha, 84,7);
	$data_pagamento_ajuste = substr($linha, 91,8);
	$sinal_ajuste_debito = substr($linha, 99,1);
	$valor_ajuste_debito = substr($linha, 100,13);
	$sinal_compensado = substr($linha, 113,1);
	$valor_compensado = substr($linha, 114,13);
	$sinal_saldo_antecipado = substr($linha, 127,1);
	$valor_saldo_antecipado = substr($linha, 129,13);
	$reservado = substr($linha, 141,109);

	$inserir = "INSERT INTO debitos_antecipados (tipo, codigo_comercial, numero_ro_original, numero_ro_antecipado, data_pagamento_ro, sinal_ro_antecipado, valor_ro_antecipado, originou_ajuste, numero_ro_debito, data_pagamento_ajuste, sinal_ajuste_debito, valor_ajuste_debito, sinal_compensado, valor_compensado, sinal_saldo_antecipado, valor_saldo_antecipado, reservado)
	values ('$tipo', '$codigo_comercial', '$numero_ro_original', $numero_ro_antecipado, '$data_pagamento_ro', '$sinal_ro_antecipado', $valor_ro_antecipado, '$originou_ajuste', $numero_ro_debito, '$data_pagamento_ajuste', '$sinal_ajuste_debito', $valor_ajuste_debito, '$sinal_compensado', $valor_compensado, '$sinal_saldo_antecipado', $valor_saldo_antecipado, '$reservado')";

	$query = mysqli_query($conexao, $inserir) or die("Debitos antecipados".mysqli_error($conexao));
}
