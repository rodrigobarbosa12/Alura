<?php
require_once("conexao.php");
require_once("convert.php");
require_once("cabecalho.php");
require_once("resumoVendas.php");
require_once("comprovanteVendas.php");
require_once("antecipacao.php");
require_once("rosAntecipadosTivit.php");
require_once("debitosAntecipadosTivit.php");
require_once("trailer.php");
require_once("query.php");
require_once("Colunas.php");

/**
 *  pega os extratos a partir de um diretorio e faz backup
 */
// $diretorio = 'extrato-tivit/';
// $listaDeArquivos = shell_exec('ls extrato-tivit');
// $arquivos = preg_split('/\s+/', trim($listaDeArquivos));

// foreach ($arquivos as $arquivo) {
// 	$extratos = file($diretorio.$arquivo);
// 	getRegistrosTivit($extratos, $conexao);

// 	$backup = 'backup-tivit/'.$arquivo;
// 	copy($diretorio.$arquivo, $backup);
// 	unlink($diretorio.$arquivo);
// }



$select = "SELECT * FROM conciliadora.arquivos where conteudo like '%CIELO%'";

$query = mysqli_query($conConciliadora, $select) or die('Erro ao buscar');

	while ($rows = mysqli_fetch_assoc($query)) {

			$row[] = $rows['conteudo'];
	}

	$coluna = new Colunas();

	foreach ($row as $key => $linhas) {

		$linha[$key] = $linhas;
		$extratos = preg_split('/\n/', trim($linha[$key]));
		getRegistrosTivit($extratos, $pdo, $conexao, $coluna);

	}


function getRegistrosTivit($extratos, $pdo, $conexao, $coluna){
	foreach ($extratos as $extrato) {
		salvar($extrato, $pdo, $conexao, $coluna);
	}
}

function salvar($extrato, $pdo, $conexao, $coluna)
{
	$tipo_registro = substr($extrato, 0, 1);

	switch ($tipo_registro) {
		case 0:
			cabecalhoTivit($extrato, $pdo, $conexao, $coluna);
			break;
		case 1:
			resumoVendasTivt($extrato, $pdo, $conexao, $coluna);
			break;
		case 2:
			comprovanteVendasTivt($extrato, $conexao);
			break;
		case 5:
			antecipacaoTivit($extrato, $conexao);
			break;
		case 6:
			rosAntecipados($extrato, $conexao);
			break;
		case 7:
			debitosAntecipados($extrato, $conexao);
			break;
		case 9:
			trailerTivit($extrato, $conexao);
			break;
	}
}
