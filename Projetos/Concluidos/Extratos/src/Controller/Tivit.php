<?php
require_once("../../conexao/ConKensei.php");
require_once("../../conexao/ConConciliadora.php");
require_once("../Mapper/QueryTivit.php");
require_once("../Mapper/Funcoes.php");
require_once("../Service/Cabecalho.php");
require_once("../Service/Resumo.php");
require_once("../Service/Comprovante.php");
require_once("../Service/Antecipacao.php");
require_once("../Service/Trailer.php");
require_once("../Service/Ros_antecipadosTivit.php");
require_once("../Service/Debitos_antecipadosTivit.php");
require_once("../Entity/Colunas.php");


$coluna = new Colunas();

$select = selectConciliadora($pdoConciliadora, "'%CIELO%'");

	while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {

			$row[] = $rows['conteudo'];
			$arquivo[] = $rows['arquivo'];
	}

	//Faz quebra de linha do extrato
	foreach ($row as $key => $linhas) {

		$linha[$key] = $linhas;
		$extratos = preg_split('/\n/', trim($linha[$key]));
		getRegistrosTivit($extratos, $arquivo[$key], $pdo, $pdoConciliadora, $coluna);
	}

	//Percorre as linhas do extrato
function getRegistrosTivit($extratos, $arquivo, $pdo, $pdoConciliadora, $coluna){

	foreach ($extratos as $extrato) {
		 salvar($extrato, $arquivo, $pdo, $pdoConciliadora, $coluna);
	}
}

function salvar($extrato, $arquivo, $pdo, $pdoConciliadora, $coluna)
{
	$tipo_registro = substr($extrato, 0, 1);

	switch ($tipo_registro) {
		case 0:
			cabecalhoTivit($extrato, $arquivo, $pdo, $coluna);
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
			trailerTivit($extrato, $arquivo, $pdo, $pdoConciliadora, $coluna);
			break;
	}
}
