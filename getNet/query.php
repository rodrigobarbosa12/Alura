<?php


function inserirCabacalhoTivit($pdo, $conexao, $coluna)
{
    $tipo = $coluna->getTipo();
    $estabelecimento = $coluna->getEstabelecimento();
    $data_criacao = $coluna->getDataCriacao();
    $data_inicial = $coluna->getDataInicial();
    $data_final = $coluna->getDataFinal();
    $sequencia = $coluna->getSequencia();
    $adquirente = $coluna->getAdquirente();
    $opcao_extrato = $coluna->getOpcaoExtrato();
    $van = $coluna->getVan();
    $caixa_postal = $coluna->getCaixaPostal();
    $versao_layout = $coluna->getVersaoLayout();
    $reservado = $coluna->getReservado();
    $integracoes_id = verificarEstabelecimento($conexao, $estabelecimento);

    $stmt = $pdo->prepare("INSERT INTO header (tipo, estabelecimento, data_criacao,
		data_inicial, data_final, sequencia, adquirente, opcao_extrato, van,
		caixa_postal, versao_layout, reservado, integracoes_id)
	values (:tipo, :estabelecimento, :data_criacao, :data_inicial,
		:data_final, :sequencia, :adquirente, :opcao_extrato, :van,
        :caixa_postal, :versao_layout, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_NULL);
    $stmt->bindParam(':estabelecimento', $estabelecimento, PDO::PARAM_NULL);
    $stmt->bindParam(':data_criacao', $data_criacao, PDO::PARAM_NULL);
    $stmt->bindParam(':data_inicial', $data_inicial, PDO::PARAM_NULL);
    $stmt->bindParam(':data_final', $data_final, PDO::PARAM_NULL);
    $stmt->bindParam(':sequencia', $sequencia, PDO::PARAM_NULL);
    $stmt->bindParam(':adquirente', $adquirente, PDO::PARAM_NULL);
    $stmt->bindParam(':opcao_extrato', $opcao_extrato, PDO::PARAM_NULL);
    $stmt->bindParam(':van', $van, PDO::PARAM_NULL);
    $stmt->bindParam(':caixa_postal', $caixa_postal, PDO::PARAM_NULL);
    $stmt->bindParam(':versao_layout', $versao_layout, PDO::PARAM_NULL);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_NULL);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);
    $stmt->execute();


	// $inserir = "INSERT INTO header (tipo, estabelecimento, data_criacao,
	// 	data_inicial, data_final, sequencia, adquirente, opcao_extrato, van,
	// 	caixa_postal, versao_layout, reservado, integracoes_id)
	// values ('$tipo', '$estabelecimento', '$data_criacao', '$data_inicial',
	// 	'$data_final', $sequencia, '$adquirente', $opcao_extrato, '$van',
    //     '$caixa_postal', '$versao_layout', '$reservado', $integracoes_id)";

	// $query = mysqli_query($conexao, $inserir) or die("Cabeçalho " .mysqli_error($conexao));
}


function inserirResumoTivit($pdo, $conexao, $coluna)
{

}
















function verificarEstabelecimento($conexao, $estabelecimento)
{
    $select = "SELECT id FROM integracoes where estabelecimento = $estabelecimento";
    $query = mysqli_query($conexao, $select) or die(mysqli_error($conexao));


    foreach ($acao = mysqli_fetch_assoc($query) as $idIntegracao){
        $integracoes_id = intval($idIntegracao);
    }

    return $integracoes_id;
}