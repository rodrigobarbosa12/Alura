<?php

function selectConciliadora($pdoConciliadora)
{
    $stmt = $pdoConciliadora->prepare("SELECT * FROM conciliadora.arquivos where conteudo like '%GETNET%' && traducao = 0");
    echo ($stmt->execute()) ? retorno('Select ok', true) : retorno('Todos os extratos estão traduzidos', $stmt->errorInfo());
    return $stmt;
}

function traduzidoGetNet($pdoConciliadora, $arquivo)
{
    $traduzido = 1;
    $stmt = $pdoConciliadora->prepare("update conciliadora.arquivos set traducao = :traduzido where conteudo like '%GETNET%' && arquivo = :arquivo");
    $stmt->bindParam(':traduzido', $traduzido , PDO::PARAM_INT);
    $stmt->bindParam(':arquivo', $arquivo , PDO::PARAM_STR);

    echo ($stmt->execute()) ? retorno('Traduzido com sucesso', true) : retorno($stmt->errorInfo())."</br></br>";
}

function inserirCabecalhoGetNet($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
    $data_criacao = $coluna->getDataCriacao();
    $hora_criacao = $coluna->getHoraCriacao();
	$data_referencia = $coluna->getDataReferencia();
	$versao_arquivo = $coluna->getVersaoArquivo();
	$estabelecimento = $coluna->getEstabelecimento();
	$cnpj = $coluna->getCnpj();
	$adquirente = $coluna->getAdquirente();
	$sequencia = $coluna->getSequencia();
	$codigo_adquirente = $coluna->getCodigoAdquirente();
	$versao_layout = $coluna->getVersaoLayout();
    $reservado = $coluna->getReservado();
    verificarEstabelecimento($pdo, $coluna, $estabelecimento);
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO header (tipo, data_criacao, hora_criacao,
            data_referencia, versao_arquivo, estabelecimento,
            cnpj, adquirente, sequencia, codigo_adquirente, versao_layout,
            reservado, integracoes_id)
    VALUES (:tipo, :data_criacao, :hora_criacao, :data_referencia,
            :versao_arquivo, :estabelecimento, :cnpj, :adquirente, :sequencia,
            :codigo_adquirente, :versao_layout, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':data_criacao', $data_criacao, PDO::PARAM_STR);
    $stmt->bindParam(':hora_criacao', $hora_criacao, PDO::PARAM_STR);
    $stmt->bindParam(':data_referencia', $data_referencia, PDO::PARAM_STR);
    $stmt->bindParam(':versao_arquivo', $versao_arquivo, PDO::PARAM_STR);
    $stmt->bindParam(':estabelecimento', $estabelecimento, PDO::PARAM_STR);
    $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_INT);
    $stmt->bindParam(':adquirente', $adquirente, PDO::PARAM_STR);
    $stmt->bindParam(':sequencia', $sequencia, PDO::PARAM_INT);
    $stmt->bindParam(':codigo_adquirente', $codigo_adquirente, PDO::PARAM_STR);
    $stmt->bindParam(':versao_layout', $versao_layout, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'cabecalho' inserido com sucesso", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirResumoGetNet($pdo, $coluna)
{

    $tipo = $coluna->getTipo();
	$codigo_comercial = $coluna->getCodigoComercial();
	$codigo_produto = $coluna->getCodigoProduto();
	$captura = $coluna->getCaptura();
	$numero = $coluna->getNumeroRv();
	$data_rv = $coluna->getDataRv();
	$data_pagamento = $coluna->getDataPagamentoRv();
	$banco = $coluna->getBanco();
	$agencia = $coluna->getAgencia();
	$conta_corrent = $coluna->getContaCorrente();
	$cv_aceitos = $coluna->getCvAceitos();
	$cv_rejeitados = $coluna->getCvRejeitados();
	$valor_bruto = $coluna->getValorBruto();
	$valor_liquido = $coluna->getValorLiquido();
	$tarifa = $coluna->getTarifa();
	$taxa_desconto = $coluna->getTaxaDesconto();
	$rejeitado = $coluna->getRejeitado();
	$credito = $coluna->getCredito();
	$encargos = $coluna->getEncargos();
	$tipo_pagamento = $coluna->getTipoPagamento();
	$parcela_rv = $coluna->getParcelaRv();
	$quantidade_parcelas_rv = $coluna->getQuantidadeParcelasRv();
	$codigo_estabelecimento = $coluna->getCodigoEstabelecimento();
	$operacao_antecipacao = $coluna->getOperacaoAntecipacao();
	$data_vencimento_rv = $coluna->getDataVencimentoRv();
	$custo_operacao = $coluna->getCustoOperacao();
	$liquido_rv_antecipado = $coluna->getLiquidoRvAntecipado();
	$controle_cobranca = $coluna->getControleCobranca();
	$liquido_cobranca = $coluna->getLiquidoCobranca();
	$id_compensacao = $coluna->getIdCompensacao();
	$moeda = $coluna->getMoeda();
	$baixa_cobranca_servico = $coluna->getBaixaCobrancaServico();
	$sinal_transacao = $coluna->getSinalTransacao();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO detalhe_resumo (tipo, codigo_comercial, codigo_produto, captura, numero_rv,
        data_rv, data_pagamento_rv, banco, agencia, conta_corrente, cv_aceitos,
        cv_rejeitados, valor_bruto, valor_liquido, tarifa, taxa_desconto, rejeitado,
        credito, encargos, tipo_pagamento, parcela_rv, quantidade_parcelas_rv, codigo_estabelecimento,
        operacao_antecipacao, data_vencimento_rv, custo_operacao, liquido_rv_antecipado, controle_cobranca,
        liquido_cobranca, id_compensacao, moeda, baixa_cobranca_servico, sinal_transacao, reservado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :codigo_produto, :captura, :numero_rv, :data_rv,
        :data_pagamento_rv, :banco, :agencia, :conta_corrente, :cv_aceitos, :cv_rejeitados,
        :valor_bruto, :valor_liquido, :tarifa, :taxa_desconto, :rejeitado, :credito, :encargos,
        :tipo_pagamento, :parcela_rv, :quantidade_parcelas_rv, :codigo_estabelecimento,
        :operacao_antecipacao, :data_vencimento_rv, :custo_operacao, :liquido_rv_antecipado,
        :controle_cobranca, :liquido_cobranca, :id_compensacao, :moeda, :baixa_cobranca_servico,
        :sinal_transacao, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_STR);
    $stmt->bindParam(':captura', $captura, PDO::PARAM_STR);
    $stmt->bindParam(':numero_rv', $numero_rv, PDO::PARAM_INT);
    $stmt->bindParam(':data_rv', $data_rv, PDO::PARAM_STR);
    $stmt->bindParam(':data_pagamento_rv', $data_pagamento_rv, PDO::PARAM_STR);
    $stmt->bindParam(':banco', $banco, PDO::PARAM_INT);
    $stmt->bindParam(':agencia', $agencia, PDO::PARAM_INT);
    $stmt->bindParam(':conta_corrente', $conta_corrente, PDO::PARAM_STR);
    $stmt->bindParam(':cv_aceitos', $cv_aceitos, PDO::PARAM_NULL);
    $stmt->bindParam(':cv_rejeitados', $cv_rejeitados, PDO::PARAM_INT);
    $stmt->bindParam(':valor_bruto', $valor_bruto, PDO::PARAM_INT);
    $stmt->bindParam(':valor_liquido', $valor_liquido, PDO::PARAM_INT);
    $stmt->bindParam(':tarifa', $tarifa, PDO::PARAM_INT);
    $stmt->bindParam(':taxa_desconto', $taxa_desconto, PDO::PARAM_INT);
    $stmt->bindParam(':rejeitado', $rejeitado, PDO::PARAM_INT);
    $stmt->bindParam(':credito', $credito, PDO::PARAM_INT);
    $stmt->bindParam(':encargos', $encargos, PDO::PARAM_INT);
    $stmt->bindParam(':tipo_pagamento', $tipo_pagamento, PDO::PARAM_STR);
    $stmt->bindParam(':parcela_rv', $parcela_rv, PDO::PARAM_STR);
    $stmt->bindParam(':quantidade_parcelas_rv', $quantidade_parcelas_rv, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_estabelecimento', $codigo_estabelecimento, PDO::PARAM_STR);
    $stmt->bindParam(':operacao_antecipacao', $operacao_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':data_vencimento_rv', $data_vencimento_rv, PDO::PARAM_STR);
    $stmt->bindParam(':custo_operacao', $custo_operacao, PDO::PARAM_INT);
    $stmt->bindParam(':liquido_rv_antecipado', $liquido_rv_antecipado, PDO::PARAM_INT);
    $stmt->bindParam(':controle_cobranca', $controle_cobranca, PDO::PARAM_INT);
    $stmt->bindParam(':liquido_cobranca', $liquido_cobranca, PDO::PARAM_INT);
    $stmt->bindParam(':id_compensacao', $id_compensacao, PDO::PARAM_INT);
    $stmt->bindParam(':moeda', $moeda, PDO::PARAM_INT);
    $stmt->bindParam(':baixa_cobranca_servico', $baixa_cobranca_servico, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_transacao', $sinal_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'resumo' inserido com sucesso", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirComprovanteGetNet($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
	$codigo_comercial = $coluna->getCodigoComercial();
	$numero_rv = $coluna->getNumeroRv();
	$nsu = $coluna->getNsu();
	$data_transacao = $coluna->getDataTransacao();
	$hora_transacao = $coluna->getHoraTransacao();
	$numero_cartao = $coluna->getNumeroCartao();
	$valor_transacao = $coluna->getValorTransacao();
	$valor_saque = $coluna->getValorSaque();
	$taxa_embarque = $coluna->getTaxaEmbarque();
	$parcelas = $coluna->getParcelas();
	$parcela_cv = $coluna->getParcelaCv();
    $valor_parcela = $coluna->getValorParcela();
	$data_pagamento = $coluna->getDataPagamento();
	$autorizacao = $coluna->getAutorizacao();
	$captura = $coluna->getCaptura();
	$status = $coluna->getStatus();
	$centralizador_pagamentos = $coluna->getCentralizadorPagamentos();
	$codigo_terminal = $coluna->getCodigoTerminal();
	$moeda = $coluna->getMoeda();
	$emissor = $coluna->getEmissor();
	$sinal_transacao = $coluna->getSinalTransacao();
	$carteira = $coluna->getCarteira();
	$reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO detalhe_comprovante (tipo, codigo_comercial, numero_rv, nsu,
        data_transacao, hora_transacao, numero_cartao, valor_transacao, valor_saque, taxa_embarque,
        parcelas, parcela_cv, valor_parcela, data_pagamento, autorizacao, captura, status, centralizador_pagamentos,
        codigo_terminal, moeda, emissor, sinal_transacao, carteira, reservado, integracoes_id)
	VALUES (:tipo, :codigo_comercial, :numero_rv, :nsu,:data_transacao, :hora_transacao, :numero_cartao,
        :valor_transacao, :valor_saque, :taxa_embarque, :parcelas, :parcela_cv, :valor_parcela, :data_pagamento,
        :autorizacao, :captura, :status, :centralizador_pagamentos, :codigo_terminal, :moeda, :emissor,
        :sinal_transacao, :carteira, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':numero_rv', $numero_rv, PDO::PARAM_INT);
    $stmt->bindParam(':nsu', $nsu, PDO::PARAM_STR);
    $stmt->bindParam(':data_transacao', $data_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':hora_transacao', $hora_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':numero_cartao', $numero_cartao, PDO::PARAM_STR);
    $stmt->bindParam(':valor_transacao', $valor_transacao, PDO::PARAM_INT);
    $stmt->bindParam(':valor_saque', $valor_saque, PDO::PARAM_INT);
    $stmt->bindParam(':taxa_embarque', $taxa_embarque, PDO::PARAM_STR);
    $stmt->bindParam(':parcelas', $parcelas, PDO::PARAM_INT);
    $stmt->bindParam(':parcela_cv', $parcela_cv, PDO::PARAM_INT);
    $stmt->bindParam(':valor_parcela', $valor_parcela, PDO::PARAM_INT);
    $stmt->bindParam(':data_pagamento', $data_pagamento, PDO::PARAM_STR);
    $stmt->bindParam(':autorizacao', $autorizacao, PDO::PARAM_STR);
    $stmt->bindParam(':captura', $captura, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':centralizador_pagamentos', $centralizador_pagamentos, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_terminal', $codigo_terminal, PDO::PARAM_STR);
    $stmt->bindParam(':moeda', $moeda, PDO::PARAM_INT);
    $stmt->bindParam(':emissor', $emissor, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_transacao', $sinal_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':carteira', $carteira, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'comprovante' inserido com sucesso", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirAjustesGetNet($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
	$codigo_comercial = $coluna->getCodigoComercial();
	$rv_ajustado = $coluna->getRvAjustado();
	$data_rv = $coluna->getDataRv();
	$data_pagamento_rv = $coluna->getDataPagamentoRv();
	$identificador_ajuste = $coluna->getIdentificadorAjuste();
	$brancos = $coluna->getBrancos();
	$sinal_valor_ajuste = $coluna->getSinalValorAjuste();
	$valor_ajuste = $coluna->getValorAjuste();
	$motivo_ajuste = $coluna->getMotivoAjuste();
	$data_carta = $coluna->getDataCarta();
	$numero_cartao = $coluna->getNumeroCartao();
	$rv_original = $coluna->getRvOriginal();
	$nsu_adquirente = $coluna->getNsuAdquirente();
	$data_transacao_original = $coluna->getDataTransacaoOriginal();
	$indicador_tipo_pagamento = $coluna->getIndicadorTipoPagamento();
	$numero_terminal = $coluna->getNumeroTerminal();
	$data_pagamento = $coluna->getDataPagamento();
	$moeda = $coluna->getMoeda();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO ajustes (tipo, codigo_comercial, rv_ajustado, data_rv,
        data_pagamento_rv, identificador_ajuste, brancos, sinal_valor_ajuste, valor_ajuste, motivo_ajuste,
        data_carta, numero_cartao, rv_original, nsu_adquirente, data_transacao_original, indicador_tipo_pagamento,
        numero_terminal, data_pagamento, moeda, reservado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :rv_ajustado, :data_rv, :data_pagamento_rv, :identificador_ajuste,
        :brancos, :sinal_valor_ajuste, :valor_ajuste, :motivo_ajuste, :data_carta, :numero_cartao,
        :rv_original, :nsu_adquirente, :data_transacao_original, :indicador_tipo_pagamento, :numero_terminal,
        :data_pagamento, :moeda, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':rv_ajustado', $rv_ajustado, PDO::PARAM_INT);
    $stmt->bindParam(':data_rv', $data_rv, PDO::PARAM_STR);
    $stmt->bindParam(':data_pagamento_rv', $data_pagamento_rv, PDO::PARAM_STR);
    $stmt->bindParam(':identificador_ajuste', $identificador_ajuste, PDO::PARAM_INT);
    $stmt->bindParam(':brancos', $brancos, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_valor_ajuste', $sinal_valor_ajuste, PDO::PARAM_STR);
    $stmt->bindParam(':valor_ajuste', $valor_ajuste, PDO::PARAM_INT);
    $stmt->bindParam(':motivo_ajuste', $motivo_ajuste, PDO::PARAM_STR);
    $stmt->bindParam(':data_carta', $data_carta, PDO::PARAM_STR);
    $stmt->bindParam(':numero_cartao', $numero_cartao, PDO::PARAM_STR);
    $stmt->bindParam(':rv_original', $rv_original, PDO::PARAM_INT);
    $stmt->bindParam(':nsu_adquirente', $nsu_adquirente, PDO::PARAM_INT);
    $stmt->bindParam(':data_transacao_original', $data_transacao_original, PDO::PARAM_STR);
    $stmt->bindParam(':indicador_tipo_pagamento', $indicador_tipo_pagamento, PDO::PARAM_STR);
    $stmt->bindParam(':numero_terminal', $numero_terminal, PDO::PARAM_STR);
    $stmt->bindParam(':data_pagamento', $data_pagamento, PDO::PARAM_STR);
    $stmt->bindParam(':moeda', $moeda, PDO::PARAM_INT);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'ajustes' inserido com sucesso", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirAntecipacaoGetNet($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
	$codigo_comercial = $coluna->getCodigoComercial();
	$data_operacao = $coluna->getDataOperacao(convertData());
	$data_credito = $coluna->getDataCredito(convertData());
	$numero_operacao = $coluna->getNumeroOperacao();
	$antecipacao_bruto = $coluna->getAntecipacaoBruto();
	$taxa_antecipacao = $coluna->getTaxaAntecipacao();
	$liquido_antecipacao = $coluna->getLiquidoAntecipacao();
	$texa_mes_operacao = $coluna->getTexaMesOperacao();
	$centralizador_pagamentos = $coluna->getCentralizadorPagamentos();
	$banco_domicilio = $coluna->getBancoDomicilio();
	$agencia_domicilio = $coluna->getAgenciaDomicilio();
	$conta_domicilio = $coluna->getContaDomicilio();
	$canal_antecipacao = $coluna->getCanalAntecipacao();
	$tipo_pagamento = $coluna->getTipoPagamento();
	$reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO detalhe_antecipacao (tipo, codigo_comercial, data_operacao,
        data_credito, numero_operacao, antecipacao_bruto, taxa_antecipacao, liquido_antecipacao, liquido_antecipacao,
        texa_mes_operacao, centralizador_pagamentos, banco_domicilio, agencia_domicilio, conta_domicilio, canal_antecipacao,
        tipo_pagamento, reservado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :data_operacao, :data_credito, :numero_operacao, :antecipacao_bruto,
        :taxa_antecipacao, :liquido_antecipacao, :texa_mes_operacao, :centralizador_pagamentos, :banco_domicilio,
        :agencia_domicilio, :conta_domicilio, :canal_antecipacao, :tipo_pagamento, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':data_operacao', $data_operacao, PDO::PARAM_STR);
    $stmt->bindParam(':data_credito', $data_credito, PDO::PARAM_STR);
    $stmt->bindParam(':numero_operacao', $numero_operacao, PDO::PARAM_INT);
    $stmt->bindParam(':antecipacao_bruto', $antecipacao_bruto, PDO::PARAM_INT);
    $stmt->bindParam(':taxa_antecipacao', $taxa_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':liquido_antecipacao', $liquido_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':texa_mes_operacao', $texa_mes_operacao, PDO::PARAM_INT);
    $stmt->bindParam(':centralizador_pagamentos', $centralizador_pagamentos, PDO::PARAM_STR);
    $stmt->bindParam(':banco_domicilio', $banco_domicilio, PDO::PARAM_INT);
    $stmt->bindParam(':agencia_domicilio', $agencia_domicilio, PDO::PARAM_INT);
    $stmt->bindParam(':conta_domicilio', $conta_domicilio, PDO::PARAM_STR);
    $stmt->bindParam(':canal_antecipacao', $canal_antecipacao, PDO::PARAM_STR);
    $stmt->bindParam(':tipo_pagamento', $tipo_pagamento, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'antecipacao' inserido com sucesso", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirTrailerGetNet($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
	$quantidade_registro = $coluna->getQuantidadeRegistro();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO trailer_arquivo (tipo, quantidade_registro, reservado, integracoes_id)
    VALUES (:tipo, :quantidade_registro, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':quantidade_registro', $quantidade_registro, PDO::PARAM_INT);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_STR);

    echo ($stmt->execute()) ? retorno("Extrato 'trailer' inserido com sucesso", true) : retorno($stmt->errorInfo())."</br></br>";
}


function verificarEstabelecimento($pdo, $coluna, $estabelecimento)
{
    $select = $pdo->prepare("SELECT id FROM integracoes where estabelecimento = :estabelecimento");
    $select->bindParam(':estabelecimento', $estabelecimento, PDO::PARAM_INT);

    echo ($select->execute()) ? retorno('Ok', true) : retorno($stmt->errorInfo())."</br></br>";

        while ($id = $select->fetch(PDO::FETCH_ASSOC)) {
            $integracoes_id = $id['id'];
	}

    $coluna->setIntegracoesId($integracoes_id);
    return $select;
}