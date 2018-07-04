<?php

function trailerGetNet($linha, $pdo, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setQuantidadeRegistro(substr($linha, 1,9));
	$coluna->setReservado(substr($linha, 10,390));

	inserirTrailerGetNet($pdo, $coluna);
}


function trailerTivit($linha, $pdo, $coluna)
{
	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setQuantidadeRegistro(substr($linha, 1,11));
	$coluna->setReservado(substr($linha, 12,238));

	inserirTrailerTivit($pdo, $coluna);
}
