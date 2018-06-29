<?php
require_once("conexao.php");
require_once("convert.php");
require_once("cabecalho.php");
require_once("resumoVendas.php");
require_once("comprovanteVendas.php");
require_once("ajustes.php");
require_once("antecipacao.php");
require_once("trailer.php");

// $diretorio = 'extrato-getnet/';
// $listaDeArquivos = shell_exec('ls extrato-getnet');
// $arquivos = preg_split('/\s+/', trim($listaDeArquivos));


// foreach ($arquivos as $arquivo) {
// 	$extratos = file($diretorio.$arquivo);
// 	getRegistrosGetNet($extratos, $conexao);

// 	$backup = 'backup-getnet/'.$arquivo;
// 	copy($diretorio.$arquivo, $backup);
// 	unlink($diretorio.$arquivo);
// }


$select = "SELECT * FROM conciliadora.arquivos where conteudo like '%GETNET%'";

$query = mysqli_query($conConciliadora, $select) or die('Erro ao buscar');

	while ($rows = mysqli_fetch_assoc($query)) {

			$row[] = $rows['conteudo'];
	}

	foreach ($row as $key => $linhas) {

		$linha[$key] = $linhas;
		$extratos = preg_split('/\n/', trim($linha[$key]));
		getRegistrosGetNet($extratos, $conexao);

	}

function getRegistrosGetNet($extratos, $conexao){
	foreach ($extratos as $key => $extrato) {

		$array[$key] = $extrato;
		salvar($array[$key], $conexao);
	}
}

function salvar($array, $conexao)
{
	$tipo_registro = substr($array, 0, 1);

	switch ($tipo_registro) {
		case 0:
			cabecalhoGetNet($array, $conexao);
			break;
		case 1:
			resumoVendasGetNet($array, $conexao);
			break;
		case 2:
			comprovanteVendasGetNet($array, $conexao);
			break;
		case 3:
			ajustesGetNet($array, $conexao);
			break;
		case 4:
			antecipacaoGetNet($array, $conexao);
			break;
		case 9:
			trailerGetNet($array, $conexao);
			break;
	}
}
