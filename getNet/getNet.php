<?php
require_once("conexao.php");
require_once("conConciliadora.php");
require_once("util.php");
require_once("convert.php");
require_once("queryGetNet.php");
require_once("cabecalho.php");
require_once("resumoVendas.php");
require_once("comprovanteVendas.php");
require_once("ajustes.php");
require_once("antecipacao.php");
require_once("trailer.php");
require_once("Colunas.php");


// Pega os extratos a partir de um diretorio e faz backup

// $diretorio = 'extrato-getnet/';
// $listaDeArquivos = shell_exec('ls extrato-getnet');
// $arquivos = preg_split('/\s+/', trim($listaDeArquivos));

// foreach ($arquivos as $arquivo) {
// 	$extratos = file($diretorio.$arquivo);
// 	getRegistrosGetNet($extratos, $pdo);

// 	$backup = 'backup-getnet/'.$arquivo;
// 	copy($diretorio.$arquivo, $backup);
// 	unlink($diretorio.$arquivo);
// }


$coluna = new Colunas();

$select = selectConciliadora($pdoConciliadora);

	while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {

			$arquivo = $rows['arquivo'];
			$row[] = $rows['conteudo'];
			traduzidoGetNet($pdoConciliadora, $arquivo);
	}

	//Faz quebra de linha do extrato
	foreach ($row as $key => $linhas) {

		$linha[$key] = $linhas;
		$extratos = preg_split('/\n/', trim($linha[$key]));
		getRegistrosGetNet($extratos, $pdo, $coluna);

	}

	//Percorre as linhas do extrato
function getRegistrosGetNet($extratos, $pdo, $coluna){

	foreach ($extratos as $extrato) {
		salvar($extrato, $pdo, $coluna);
	}
}

function salvar($extrato, $pdo, $coluna)
{
	$tipo_registro = substr($extrato, 0, 1);

	switch ($tipo_registro) {
		case 0:
			cabecalhoGetNet($extrato, $pdo, $coluna);
			break;
		case 1:
			resumoVendasGetNet($extrato, $pdo, $coluna);
			break;
		case 2:
			comprovanteVendasGetNet($extrato, $pdo, $coluna);
			break;
		case 3:
			ajustesGetNet($extrato, $pdo, $coluna);
			break;
		case 4:
			antecipacaoGetNet($extrato, $pdo, $coluna);
			//Falta testar
			break;
		case 9:
			trailerGetNet($extrato, $pdo, $coluna);
			break;
	}
}
