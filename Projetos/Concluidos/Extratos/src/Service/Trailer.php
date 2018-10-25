<?php

	function trailerGetNet($linha, $arquivo, $pdo, $pdoConciliadora, $coluna)
	{
		$coluna->setTipo(substr($linha, 0,1));
		$coluna->setQuantidadeRegistro(substr($linha, 1,9));
		$coluna->setReservado(substr($linha, 10,390));

		inserirTrailerGetNet($arquivo, $pdo, $pdoConciliadora, $coluna);
	}


	function trailerTivit($linha, $arquivo, $pdo, $pdoConciliadora, $coluna)
	{
		$coluna->setTipo(substr($linha, 0,1));
		$coluna->setQuantidadeRegistro(substr($linha, 1,11));
		$coluna->setReservado(substr($linha, 12,238));

		inserirTrailerTivit($pdo, $arquivo, $pdoConciliadora, $coluna);
	}

