<?php

function ajustesGetNet($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$codigo_comercial = substr($linha, 2,15);
	$rv_ajustado = substr($linha, 16,9);
	$data_rv = convertData(substr($linha, 25,8));
	$data_pagamento_rv = convertData(substr($linha, 33,8));
	$identificador_ajuste = substr($linha, 41,20); //Fora Do intervalo
	$brancos = substr($linha, 61,1);
	$sinal_valor_ajuste = substr($linha, 62,1);
	$valor_ajuste = substr($linha, 63,12);
	$motivo_ajuste = substr($linha, 75,2);
	$data_carta = convertData(substr($linha, 77,8));
	$numero_cartao = substr($linha, 85,19);
	$rv_original = substr($linha, 104,9);
	$nsu_adquirente = substr($linha, 113,12);
	$data_transacao_original = convertData(substr($linha, 125,8));
	$indicador_tipo_pagamento = substr($linha, 133,2);
	$numero_terminal = substr($linha, 135,8);
	$data_pagamento = convertData(substr($linha, 143,8));
	$moeda = substr($linha, 151,3);
	$reservado = substr($linha, 154,246);
	$integracoes_id = 2;

	$inserir = "INSERT INTO ajustes (tipo, codigo_comercial, rv_ajustado, data_rv, data_pagamento_rv, identificador_ajuste, brancos, sinal_valor_ajuste, valor_ajuste, motivo_ajuste, data_carta, numero_cartao, rv_original, nsu_adquirente, data_transacao_original, indicador_tipo_pagamento, numero_terminal, data_pagamento, moeda, reservado, integracoes_id)
	VALUES ('$tipo', '$codigo_comercial', $rv_ajustado, '$data_rv', '$data_pagamento_rv', $identificador_ajuste, '$brancos', '$sinal_valor_ajuste', $valor_ajuste, '$motivo_ajuste', '$data_carta', '$numero_cartao', $rv_original, $nsu_adquirente, '$data_transacao_original', '$indicador_tipo_pagamento', '$numero_terminal', '$data_pagamento', $moeda, '$reservado', $integracoes_id)";

	$query = mysqli_query($conexao, $inserir) or die("Ajustes".mysqli_error($conexao));
}




// 	echo $tipo;
// 		echo "</br>";
// 	echo $codigo_comercial;
// 		echo "</br>";
// 	echo $rv_ajustado;
// 		echo "</br>";
// 	echo $data_rv;
// 		echo "</br>";
// 	echo $data_pagamento_rv;
// 		echo "</br>";
// 	echo $identificador_ajuste;
// 		echo "</br>";
// 	echo $brancos;
// 		echo "</br>";
// 	echo $sinal_valor_ajuste;
// 		echo "</br>";
// 	echo $valor_ajuste;
// 		echo "</br>";
// 	echo $motivo_ajuste;
// 		echo "</br>";
// 	echo $data_carta;
// 		echo "</br>";
// 	echo $numero_cartao;
// 		echo "</br>";
// 	echo $rv_original;
// 		echo "</br>";
// 	echo $nsu_adquirente;
// 		echo "</br>";
// 	echo $data_transacao_original;
// 		echo "</br>";
// 	echo $indicador_tipo_pagamento;
// 		echo "</br>";
// 	echo $numero_terminal;
// 		echo "</br>";
// 	echo $data_pagamento;
// 		echo "</br>";
// 	echo $moeda;
// 		echo "</br>";
// 	echo $reservado;
// 		echo "</br>";

// die();