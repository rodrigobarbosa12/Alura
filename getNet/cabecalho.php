<?php 
require_once("conciliacao.php");
require_once("convertData.php");


function cabecalho($linha, $conexao)
{
	$header = substr($linha, 0, 1);
	$data_criacao = convertData(substr($linha, 1, 8));
	$hora_criacao = convertTime(substr($linha, 9, 6));
	$data_referencia = convertData(substr($linha, 15, 8));
	$versao_arquivo = substr($linha, 23, 8);
	$estabelecimento = substr($linha, 31, 15);
	$cnpj = intval(substr($linha, 46, 14));
	$adquirente = substr($linha, 60, 20);
	$sequencia = substr($linha, 80, 9);
	$codigo_adquirente = substr($linha, 89, 2);
	$versao_layout = substr($linha, 91, 25);
	$reservado = substr($linha, 116, 284);

	$inserir = "INSERT INTO header(data_criacao, hora_criacao,
				 data_referencia, versao_arquivo, estabelecimento, 
				 cnpj, adquirente, sequencia, codigo_adquirente, versao_layout,
				 reservado) 
				 VALUES ('$data_criacao', $hora_criacao, '$data_referencia', 
				 '$versao_arquivo', '$estabelecimento', '$cnpj', '$adquirente', '$sequencia',
				 '$codigo_adquirente', '$versao_layout', '$reservado') ";
				 
	$query = mysqli_query($conexao, $inserir) or die("Cabecalho ".mysqli_error($conexao));
}
