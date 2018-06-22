<?php 
require_once("cabecalho.php");
require_once("comprovanteVenda.php");
require_once("resumoVendas.php");
require_once("conexao.php");




$linhas = file('teste.txt');

foreach($linhas as $key => $linha) {

	$array[$key] = $linha;
	verificar($array[$key], $conexao);
}

function verificar($array, $conexao)
{
	$tipo_registro = substr($array, 0, 1);

	switch ($tipo_registro) {
		case 0:
			// cabecalho($array, $conexao);
			break;
		case 1:
			// detalheResumoVendas($array, $conexao);
			break;
		case 2:
			detalhecomprovanteVendas($array, $conexao);
			break;
	}
}




