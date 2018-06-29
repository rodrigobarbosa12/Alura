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


function trailerTivit($linha, $conexao)
{
	// var_dump($linha);
	// die('Trailer');
	$tipo = substr($linha, 0,1);
	$quantidade_registro = substr($linha, 1,11);
	$reservado = substr($linha, 12,238);

	$inserir = "INSERT INTO trailer_arquivo (tipo, quantidade_registro, reservado) values ('$tipo', $quantidade_registro, '$reservado')";

	$query = mysqli_query($conexao, $inserir) or die("Trailer ".mysqli_error($conexao));
}
