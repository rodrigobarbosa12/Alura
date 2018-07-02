<?php

function trailerGetNet($linha, $conexao)
{
	$tipo = substr($linha, 0,1);
	$quantidade_registro = substr($linha, 1,9);
	$reservado = substr($linha, 10,390);
	$integracoes_id = 2;
	$inserir = "INSERT INTO trailer_arquivo (tipo, quantidade_registro, reservado, integracoes_id) VALUES ('$tipo', $quantidade_registro, '$reservado', $integracoes_id)";

	$query = mysqli_query($conexao, $inserir) or die('Trailer'.mysqli_error($conexao));
}


function trailerTivit($linha, $pdo, $conexao, $coluna)
{

	$coluna->setTipo(substr($linha, 0,1));
	$coluna->setQuantidadeRegistro(substr($linha, 1,11));
	$coluna->setReservado(substr($linha, 12,238));

	inserirTrailerTivit($pdo, $conexao, $coluna);

// 	$inserir = "INSERT INTO trailer_arquivo (tipo, quantidade_registro, reservado) values ('$tipo', $quantidade_registro, '$reservado')";

// 	$query = mysqli_query($conexao, $inserir) or die("Trailer ".mysqli_error($conexao));
}
