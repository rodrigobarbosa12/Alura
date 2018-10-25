<?php
require_once("../../conexao/ConKensei.php");
require_once("../../conexao/ConConciliadora.php");
require_once("../Mapper/QueryGetNet.php");
require_once("../Mapper/Funcoes.php");
require_once("../Service/Cabecalho.php");
require_once("../Service/Resumo.php");
require_once("../Service/Comprovante.php");
require_once("../Service/Ajustes.php");
require_once("../Service/Antecipacao.php");
require_once("../Service/Trailer.php");
require_once("../Entity/Colunas.php");


$coluna = new Colunas();

$select = selectConciliadora($pdoConciliadora, "'%GETNET%'");

	while ($rows = $select->fetch(PDO::FETCH_ASSOC)) {

			$row[] = $rows['conteudo'];
			$arquivo[] = $rows['arquivo'];

	}

	//Faz quebra de linha do extrato
	foreach ($row as $key => $linhas) {

		$linha[$key] = $linhas;
		$extratos = preg_split('/\n/', trim($linha[$key]));
		getRegistrosGetNet($extratos, $arquivo[$key], $pdo, $pdoConciliadora, $coluna);

	}

	//Recebe um arquivo por vez
	//Percorre as linhas do extrato "arquivo"
function getRegistrosGetNet($extratos, $arquivo, $pdo, $pdoConciliadora, $coluna){

	foreach ($extratos as $extrato) {
		salvar($extrato, $arquivo, $pdo, $pdoConciliadora, $coluna);
	}
}

function salvar($extrato, $arquivo, $pdo, $pdoConciliadora, $coluna)
{
	$tipo_registro = substr($extrato, 0, 1);

	switch ($tipo_registro) {
		case 0:
			cabecalhoGetNet($extrato, $arquivo, $pdo, $coluna);
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
			trailerGetNet($extrato, $arquivo, $pdo, $pdoConciliadora, $coluna);
			break;
	}
}
