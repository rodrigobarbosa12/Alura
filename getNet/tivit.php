<?php
require_once("conexao.php");
require_once("conConciliadora.php");
require_once("util.php");
require_once("convert.php");
require_once("queryTivit.php");
require_once("cabecalho.php");
require_once("resumoVendas.php");
require_once("comprovanteVendas.php");
require_once("antecipacao.php");
require_once("rosAntecipadosTivit.php");
require_once("debitosAntecipadosTivit.php");
require_once("trailer.php");
require_once("Colunas.php");


// Pega os extratos a partir de um diretorio e faz backup

// $diretorio = 'extrato-tivit/';
// $listaDeArquivos = shell_exec('ls extrato-tivit');
// $arquivos = preg_split('/\s+/', trim($listaDeArquivos));

// foreach ($arquivos as $arquivo) {
// 	$extratos = file($diretorio.$arquivo);
// 	getRegistrosTivit($extratos, $pdo);

// 	$backup = 'backup-tivit/'.$arquivo;
// 	copy($diretorio.$arquivo, $backup);
// 	unlink($diretorio.$arquivo);
// }

$coluna = new Colunas();

$select = selectTivit($pdoConciliadora);

	while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {

			$arquivo = $rows['arquivo'];
			$row[] = $rows['conteudo'];
			traduzidoTivit($pdoConciliadora, $arquivo);
	}

	//Faz quebra de linha do extrato
	foreach ($row as $key => $linhas) {

		$linha[$key] = $linhas;
		$extratos = preg_split('/\n/', trim($linha[$key]));
		getRegistrosTivit($extratos, $pdo, $coluna);

	}

	//Percorre as linhas do extrato
function getRegistrosTivit($extratos, $pdo, $coluna){

	foreach ($extratos as $extrato) {
		salvar($extrato, $pdo, $coluna);
	}
}

function salvar($extrato, $pdo, $coluna)
{
	$tipo_registro = substr($extrato, 0, 1);

	switch ($tipo_registro) {
		case 0:
			cabecalhoTivit($extrato, $pdo, $coluna);
			break;
		case 1:
			resumoVendasTivt($extrato, $pdo, $coluna);
			break;
		case 2:
			comprovanteVendasTivt($extrato, $pdo, $coluna);
			break;
		case 5:
			antecipacaoTivit($extrato, $pdo, $coluna);
			break;
		case 6:
			rosAntecipados($extrato, $pdo, $coluna);
			break;
		case 7:
			debitosAntecipados($extrato, $pdo, $coluna);
			break;
		case 9:
			trailerTivit($extrato, $pdo, $coluna);
			break;
	}
}
