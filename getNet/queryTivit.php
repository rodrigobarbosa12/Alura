<?php

function selectTivit($pdoConciliadora)
{
    $stmt = $pdoConciliadora->prepare("SELECT * FROM conciliadora.arquivos where conteudo like '%CIELO%' && traducao = 0 ");
    echo ($stmt->execute()) ? retorno('Select ok', true) : retorno('Todos os extratos estão traduzidos', $stmt->errorInfo());
    return $stmt;
}

function traduzidoTivit($pdoConciliadora, $arquivo)
{   $traduzido = 1;
    $stmt = $pdoConciliadora->prepare("update conciliadora.arquivos set traducao = :traduzido where conteudo like '%CIELO%' && arquivo = :arquivo");
    $stmt->bindParam(':traduzido', $traduzido, PDO::PARAM_INT);
    $stmt->bindParam(':arquivo', $arquivo, PDO::PARAM_STR);

    echo ($stmt->execute()) ? retorno('Traduzido com sucesso', true) : retorno($stmt->errorInfo())."</br></br>";
}

function inserirCabacalhoTivit($pdo, $coluna)
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
    verificarEstabelecimento($pdo, $coluna, $estabelecimento);
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO header (tipo, estabelecimento, data_criacao,
		data_inicial, data_final, sequencia, adquirente, opcao_extrato, van,
		caixa_postal, versao_layout, reservado, integracoes_id)
	VALUES (:tipo, :estabelecimento, :data_criacao, :data_inicial,
		:data_final, :sequencia, :adquirente, :opcao_extrato, :van,
        :caixa_postal, :versao_layout, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':estabelecimento', $estabelecimento, PDO::PARAM_STR);
    $stmt->bindParam(':data_criacao', $data_criacao, PDO::PARAM_STR);
    $stmt->bindParam(':data_inicial', $data_inicial, PDO::PARAM_STR);
    $stmt->bindParam(':data_final', $data_final, PDO::PARAM_STR);
    $stmt->bindParam(':sequencia', $sequencia, PDO::PARAM_INT);
    $stmt->bindParam(':adquirente', $adquirente, PDO::PARAM_STR);
    $stmt->bindParam(':opcao_extrato', $opcao_extrato, PDO::PARAM_INT);
    $stmt->bindParam(':van', $van, PDO::PARAM_STR);
    $stmt->bindParam(':caixa_postal', $caixa_postal, PDO::PARAM_STR);
    $stmt->bindParam(':versao_layout', $versao_layout, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'cabecalho' inserido com sucesso.", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirResumoTivit($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
    $codigo_comercial = $coluna->getCodigoComercial();
    $numero_rv = $coluna->getNumeroRv();
    $parcela_rv = $coluna->getParcelaRv();
    $filter = $coluna->getFiller();
    $quantidade_parcelas_rv = $coluna->getQuantidadeParcelasRv();
    $tipo_transacao = $coluna->getTipoTransacao();
    $data_rv = $coluna->getDataRv();
    $data_pagamento_rv = $coluna->getDataPagamentoRv();
    $data_envio = $coluna->getDataEnvio();
    $sinal_bruto = $coluna->getSinalBruto();
    $valor_bruto = $coluna->getValorBruto();
    $sinal_comissao = $coluna->getSinalComissao();
    $valor_comissao = $coluna->getValorComissao();
    $sinal_rejeitado = $coluna->getSinalRejeitado();
    $valor_rejeitado = $coluna->getValorRejeitado();
    $sinal_liquido = $coluna->getSinalLiquido();
    $valor_liquido = $coluna->getValorLiquido();
    $banco = $coluna->getBanco();
    $agencia = $coluna->getAgencia();
    $conta_corrente = $coluna->getContaCorrente();
    $status = $coluna->getStatus();
    $cv_aceitos = $coluna->getCvAceitos();
    $cv_rejeitado = $coluna->getCvRejeitados();
    $id_revenda = $coluna->getIdRevenda();
    $data_transacao = $coluna->getDataTransacao();
    $tipo_ajuste = $coluna->getTipoAjuste();
    $valor_saque = $coluna->getValorSaque();
    $id_antecipacao = $coluna->getIdAntecipacao();
    $operacao_antecipacao = $coluna->getOperacaoAntecipacao();
    $sinal_bruto_antecipacao = $coluna->getSinalBrutoAntecipacao();
    $bruto_antecipacao = $coluna->getBrutoAntecipacao();
    $bandeira = $coluna->getBandeira();
    $numero_unico_rv = $coluna->getNumeroUnicoRv();
    $taxa_comissao = $coluna->getTaxaComissao();
    $tarifa = $coluna->getTarifa();
    $taxa_garantia = $coluna->getTaxaGarantia();
    $captura = $coluna->getCaptura();
    $numero_logico_terminal = $coluna->getNumeroLogicoTerminal();
    $codigo_produto = $coluna->getCodigoProduto();
    $estabelecimento = $coluna->getEstabelecimento();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO detalhe_resumo (tipo, codigo_comercial, numero_rv, parcela_rv,
        filler, quantidade_parcelas_rv, tipo_transacao, data_rv, data_pagamento_rv, data_envio, sinal_bruto,
        valor_bruto, sinal_comissao, valor_comissao, sinal_rejeitado, valor_rejeitado, sinal_liquido, valor_liquido,
        banco, agencia, conta_corrente, status, cv_aceitos, cv_rejeitados, id_revenda, data_transacao, tipo_ajuste,
        valor_saque, id_antecipacao, operacao_antecipacao, sinal_bruto_antecipacao, bruto_antecipacao, bandeira,
        numero_unico_rv, taxa_comissao, tarifa, taxa_garantia, captura, numero_logico_terminal, codigo_produto,
        estabelecimento, reservado, integracoes_id )
    VALUE (:tipo, :codigo_comercial, :numero_rv, :parcela_rv, :filler, :quantidade_parcelas_rv, :tipo_transacao,
        :data_rv, :data_pagamento_rv, :data_envio, :sinal_bruto, :valor_bruto, :sinal_comissao, :valor_comissao, :sinal_rejeitado,
        :valor_rejeitado, :sinal_liquido, :valor_liquido, :banco, :agencia, :conta_corrente, :status, :cv_aceitos, :cv_rejeitados,
        :id_revenda, :data_transacao, :tipo_ajuste, :valor_saque, :id_antecipacao, :operacao_antecipacao, :sinal_bruto_antecipacao,
        :bruto_antecipacao, :bandeira, :numero_unico_rv, :taxa_comissao, :tarifa, :taxa_garantia, :captura, :numero_logico_terminal,
        :codigo_produto, :estabelecimento, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':numero_rv', $numero_rv, PDO::PARAM_INT);
    $stmt->bindParam(':parcela_rv', $parcela_rv, PDO::PARAM_STR);
    $stmt->bindParam(':filler', $filter, PDO::PARAM_STR);
    $stmt->bindParam(':quantidade_parcelas_rv', $quantidade_parcelas_rv, PDO::PARAM_STR);
    $stmt->bindParam(':tipo_transacao', $tipo_transacao, PDO::PARAM_INT);
    $stmt->bindParam(':data_rv', $data_rv, PDO::PARAM_STR);
    $stmt->bindParam(':data_pagamento_rv', $data_pagamento_rv, PDO::PARAM_STR);
    $stmt->bindParam(':data_envio', $data_envio, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_bruto', $sinal_bruto, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto', $valor_bruto, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_comissao', $sinal_comissao, PDO::PARAM_STR);
    $stmt->bindParam(':valor_comissao', $valor_comissao, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_rejeitado', $sinal_rejeitado, PDO::PARAM_STR);
    $stmt->bindParam(':valor_rejeitado', $valor_rejeitado, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido', $sinal_liquido, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido', $valor_liquido, PDO::PARAM_INT);
    $stmt->bindParam(':banco', $banco, PDO::PARAM_INT);
    $stmt->bindParam(':agencia', $agencia, PDO::PARAM_INT);
    $stmt->bindParam(':conta_corrente', $conta_corrente, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':cv_aceitos', $cv_aceitos, PDO::PARAM_INT);
    $stmt->bindParam(':cv_rejeitados', $cv_rejeitados, PDO::PARAM_INT);
    $stmt->bindParam(':id_revenda', $id_revenda, PDO::PARAM_STR);
    $stmt->bindParam(':data_transacao', $data_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':tipo_ajuste', $tipo_ajuste, PDO::PARAM_STR);
    $stmt->bindParam(':valor_saque', $valor_saque, PDO::PARAM_INT);
    $stmt->bindParam(':id_antecipacao', $id_antecipacao, PDO::PARAM_STR);
    $stmt->bindParam(':operacao_antecipacao', $operacao_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_bruto_antecipacao', $sinal_bruto_antecipacao, PDO::PARAM_STR);
    $stmt->bindParam(':bruto_antecipacao', $bruto_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':bandeira', $bandeira, PDO::PARAM_INT);
    $stmt->bindParam(':numero_unico_rv', $numero_unico_rv, PDO::PARAM_STR);
    $stmt->bindParam(':taxa_comissao', $taxa_comissao, PDO::PARAM_INT);
    $stmt->bindParam(':tarifa', $tarifa, PDO::PARAM_INT);
    $stmt->bindParam(':taxa_garantia', $taxa_garantia, PDO::PARAM_INT);
    $stmt->bindParam(':captura', $captura, PDO::PARAM_STR);
    $stmt->bindParam(':numero_logico_terminal', $numero_logico_terminal, PDO::PARAM_INT);
    $stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_STR);
    $stmt->bindParam(':estabelecimento', $estabelecimento, PDO::PARAM_INT);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'resumo' inserido com sucesso.", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirComprovanteTivit($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
    $codigo_comercial = $coluna->getCodigoComercial();
    $numero_rv = $coluna->getNumeroRv();
    $numero_cartao = $coluna->getNumeroCartao();
    $data_transacao = $coluna->getDataTransacao();
    $sinal_compra_parcela = $coluna->getSinalCompraParcelada();
    $compra_parcela = $coluna->getCompraParcelada();
    $parcela_cv = $coluna->getParcelaCv();
    $parcelas = $coluna->getParcelas();
    $motivo_rejeicao = $coluna->getMotivoRejeicao();
    $autorizacao = $coluna->getAutorizacao();
    $tid = $coluna->getTid();
    $nsu = $coluna->getNsu();
    $valor_transacao = $coluna->getValorTransacao();
    $digitos_cartao = $coluna->getDigitosCartao();
    $total_parcelado = $coluna->getTotalParcelas();
    $proxima_parcela = $coluna->getProximaParcela();
    $nota_fiscal = $coluna->getNotaFiscal();
    $emissor = $coluna->getEmissor();
    $codigo_terminal = $coluna->getCodigoTerminal();
    $taxa_embarque = $coluna->getTaxaEmbarque();
    $codigo_referencia = $coluna->getCodigoReferencia();
    $hora_transacao = $coluna->getHoraTransacao();
    $id_transacao = $coluna->getIdTransacao();
    $id_cielo_promo = $coluna->getIdCieloPromo();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();


    $stmt = $pdo->prepare("INSERT INTO detalhe_comprovante (tipo, codigo_comercial, numero_rv, numero_cartao,
        data_transacao, sinal_compra_parcela, compra_parcela, parcela_cv, parcelas, motivo_rejeicao, autorizacao,
        tid, nsu, valor_transacao, digitos_cartao, total_parcelado, proxima_parcela, nota_fiscal, emissor, codigo_terminal,
        taxa_embarque, codigo_referencia, hora_transacao, id_transacao, id_cielo_promo, reservado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :numero_rv, :numero_cartao, :data_transacao, :sinal_compra_parcela,
        :compra_parcela, :parcela_cv, :parcelas, :motivo_rejeicao,:autorizacao, :tid, :nsu, :valor_transacao,
        :digitos_cartao, :total_parcelado, :proxima_parcela, :nota_fiscal, :emissor, :codigo_terminal, :taxa_embarque,
        :codigo_referencia, :hora_transacao, :id_transacao, :id_cielo_promo, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':numero_rv', $numero_rv, PDO::PARAM_INT);
    $stmt->bindParam(':numero_cartao', $numero_cartao, PDO::PARAM_STR);
    $stmt->bindParam(':data_transacao', $data_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_compra_parcela', $sinal_compra_parcela, PDO::PARAM_STR);
    $stmt->bindParam(':compra_parcela', $compra_parcela, PDO::PARAM_INT);
    $stmt->bindParam(':parcela_cv', $parcela_cv, PDO::PARAM_INT);
    $stmt->bindParam(':parcelas', $parcelas, PDO::PARAM_INT);
    $stmt->bindParam(':motivo_rejeicao', $motivo_rejeicao, PDO::PARAM_STR);
    $stmt->bindParam(':autorizacao', $autorizacao, PDO::PARAM_INT);
    $stmt->bindParam(':tid', $tid, PDO::PARAM_STR);
    $stmt->bindParam(':nsu', $nsu, PDO::PARAM_STR);
    $stmt->bindParam(':valor_transacao', $valor_transacao, PDO::PARAM_INT);
    $stmt->bindParam(':digitos_cartao', $digitos_cartao, PDO::PARAM_INT);
    $stmt->bindParam(':total_parcelado', $total_parcelado, PDO::PARAM_INT);
    $stmt->bindParam(':proxima_parcela', $proxima_parcela, PDO::PARAM_INT);
    $stmt->bindParam(':nota_fiscal', $nota_fiscal, PDO::PARAM_INT);
    $stmt->bindParam(':emissor', $emissor, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_terminal', $codigo_terminal, PDO::PARAM_STR);
    $stmt->bindParam(':taxa_embarque', $taxa_embarque, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_referencia', $codigo_referencia, PDO::PARAM_STR);
    $stmt->bindParam(':hora_transacao', $hora_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':id_transacao', $id_transacao, PDO::PARAM_STR);
    $stmt->bindParam(':id_cielo_promo', $id_cielo_promo, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_NULL);

    echo ($stmt->execute()) ? retorno("Extrato 'comprovante' inserido com sucesso.", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirAntecipacaoTivit($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
    $codigo_comercial = $coluna->getCodigoComercial();
    $numero_operacao = $coluna->getNumeroOperacoa();
    $data_credito = $coluna->getDataCredito();
    $sinal_bruto_avista = $coluna->getSinalBrutoAvista();
    $valor_bruto_avista = $coluna->getValorBrutoAvista();
    $sinal_bruto_parcelado = $coluna->getSinalBrutoParcelado();
    $valor_bruto_parcelado = $coluna->getValorBrutoParcelado();
    $sinal_bruto_pre = $coluna->getSinalBrutoPre();
    $valor_bruto_pre = $coluna->getValorBrutoPre();
    $sinal_bruto_total = $coluna->getSinalBrutoToral();
    $valor_bruto_total = $coluna->getValorBrutoTotal();
    $sinal_liquido_avista = $coluna->getSinalLiquidoAvista();
    $valor_liquido_avista = $coluna->getValorLiquidoAvista();
    $sinal_liquido_parcelado = $coluna->getSinalLiquidoParcelado();
    $valor_liquido_parcelado = $coluna->getValorLiquidoParcelado();
    $sinal_liquido_pre = $coluna->getSinalLiquidoPre();
    $valor_liquido_pre = $coluna->getValorLiquidoPre();
    $sinal_liquido_total = $coluna->getSinalLiquidoTotal();
    $valor_liquido_total = $coluna->getValorLiquidoTotal();
    $taxa_antecipacao = $coluna->getTaxaAntecipacao();
    $banco_domicilio = $coluna->getBancoDomicilio();
    $agencia_domicilio = $coluna->getAgenciaDomicilio();
    $conta_domicilio = $coluna->getContaDomicilio();
    $sinal_liquido_antecipacao = $coluna->getSinalLiquidoAntecipacao();
    $liquido_antecipacao = $coluna->getLiquidoAntecipacao();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO detalhe_antecipacao (tipo, codigo_comercial, numero_operacao, data_credito,
        sinal_bruto_avista, valor_bruto_avista, sinal_bruto_parcelado, valor_bruto_parcelado, sinal_bruto_pre, valor_bruto_pre,
        sinal_bruto_total, valor_bruto_total, sinal_liquido_avista, valor_liquido_avista, sinal_liquido_parcelado, valor_liquido_parcelado,
        sinal_liquido_pre, valor_liquido_pre, sinal_liquido_total, valor_liquido_total, taxa_antecipacao, banco_domicilio,
        agencia_domicilio, conta_domicilio, sinal_liquido_antecipacao, liquido_antecipacao, reservado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :numero_operacao, :data_credito, :sinal_bruto_avista, :valor_bruto_avista,
        :sinal_bruto_parcelado, :valor_bruto_parcelado, :sinal_bruto_pre, :valor_bruto_pre, :sinal_bruto_total, :valor_bruto_total,
        :sinal_liquido_avista, :valor_liquido_avista, :sinal_liquido_parcelado, :valor_liquido_parcelado, :sinal_liquido_pre, :valor_liquido_pre,
        :sinal_liquido_total, :valor_liquido_total, :taxa_antecipacao, :banco_domicilio, :agencia_domicilio, :conta_domicilio, :sinal_liquido_antecipacao,
        :liquido_antecipacao, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':numero_operacao', $numero_operacao, PDO::PARAM_INT);
    $stmt->bindParam(':data_credito', $data_credtio, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_bruto_avista', $sinal_bruto_avista, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto_avista', $valor_bruto_avista, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_bruto_parcelado', $sinal_bruto_parcelado, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto_parcelado', $valor_bruto_parcelado, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_bruto_pre', $sinal_bruto_pre, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto_pre', $valor_bruto_pre, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_bruto_total', $sinal_bruto_total, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto_total', $valor_bruto_total, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido_avista', $sinal_liquido_avista, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido_avista', $valor_liquido_avista, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido_parcelado', $sinal_liquido_parcelado, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido_parcelado', $valor_liquido_parcelado, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido_pre', $sinal_liquido_pre, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido_pre', $valor_liquido_pre, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido_total', $sinal_liquido_total, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido_total', $valor_liquido_total, PDO::PARAM_INT);
    $stmt->bindParam(':taxa_antecipacao', $taxa_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':banco_domicilio', $banco_domicilio, PDO::PARAM_INT);
    $stmt->bindParam(':agencia_domicilio', $agencia_domicilio, PDO::PARAM_INT);
    $stmt->bindParam(':conta_domicilio', $conta_domicilio, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_liquido_antecipacao', $sinal_liquido_antecipacao, PDO::PARAM_STR);
    $stmt->bindParam(':liquido_antecipacao', $liquido_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'antecipacao' inserido com sucesso.", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirRosAntecipadosTivit($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
    $codigo_comercial = $coluna->getCodigoComercial();
    $numero_operacao = $coluna->getNumeroOperacao();
    $data_vencimento = $coluna->getDataVencimentoRo();
    $numero_ro_antecipado = $coluna->getNumeroRoAntecipado();
    $parcela_antecipada = $coluna->getParcelaAntecipada();
    $total_parcelas = $coluna->getTotalParcelas();
    $sinal_bruto_original = $coluna->getSinalBrutoOriginal();
    $valor_bruto_original = $coluna->getValorBrutoOriginal();
    $sinal_liquido_original = $coluna->getSinalLiquidoOriginal();
    $valor_liquido_original= $coluna->getValorLiquidoOriginal();
    $sinal_bruto_antecipado = $coluna->getSinalBrutoAntecipacao();
    $valor_bruto_antecipado = $coluna->getValorBrutoAntecipacao();
    $sinal_liquido_antecipacao = $coluna->getSinalLiquidoAntecipacao();
    $valor_liquido_antecipacao = $coluna->getValorLiquidoAntecipacao();
    $bandeira = $coluna->getBandeira();
    $numero_ro = $coluna->getNumeroRo();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO ros_antecipados (tipo, codigo_comercial, numero_operacao, data_vencimento_ro,
        numero_ro_antecipado, parcela_antecipada, total_parcelas, sinal_bruto_original, valor_bruto_original,
        sinal_liquido_original, valor_liquido_original, sinal_bruto_antecipacao, valor_bruto_antecipacao, sinal_liquido_antecipacao,
        valor_liquido_antecipacao, bandeira, numero_ro, revervado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :numero_operacao, :data_vencimento_ro, :numero_ro_antecipado, :parcela_antecipada, :total_parcelas,
        :sinal_bruto_original, :valor_bruto_original, :sinal_liquido_original, :valor_liquido_original, :sinal_bruto_antecipacao,
        :valor_bruto_antecipacao, :sinal_liquido_antecipacao, :valor_liquido_antecipacao, :bandeira, :numero_ro, :reservado,
        :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':numero_operacao', $numero_operacao, PDO::PARAM_INT);
    $stmt->bindParam(':data_vencimento', $data_vencimento, PDO::PARAM_STR);
    $stmt->bindParam(':numero_ro_antecipado', $numero_ro_antecipado, PDO::PARAM_INT);
    $stmt->bindParam(':parcela_antecipada', $parcela_antecipada, PDO::PARAM_INT);
    $stmt->bindParam(':total_parcelas', $total_parcelas, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_bruto_original', $sinal_bruto_original, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto_original', $valor_bruto_original, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido_original', $sinal_liquido_original, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido_original', $valor_liquido_original, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_bruto_antecipacao', $sinal_bruto_antecipacao, PDO::PARAM_STR);
    $stmt->bindParam(':valor_bruto_antecipacao', $valor_bruto_antecipado, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_liquido_antecipacao', $sinal_liquido_antecipacao, PDO::PARAM_STR);
    $stmt->bindParam(':valor_liquido_antecipacao', $valor_liquido_antecipacao, PDO::PARAM_INT);
    $stmt->bindParam(':bandeira', $bandeira, PDO::PARAM_INT);
    $stmt->bindParam(':numero_ro', $numero_ro, PDO::PARAM_STR);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'ros antecipados' inserido com sucesso.", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirDebitosAntecipacaoTivit($pdo, $coluna)
{
    $tipo = $coluna->getTipo();
    $codigo_comercial = $coluna->getCodigoComercial();
    $numero_ro_original = $coluna->getNumeroRoOriginal();
    $numero_ro_antecipado = $coluna->getNumeroRoAntecipado();
    $data_pagamento_ro = $coluna->getDataPagamentoRo();
    $sinal_ro_antecipado = $coluna->getSinalRoAntecipado();
    $valor_ro_antecipado = $coluna->getValorRoAntecipado();
    $originou_ajuste = $coluna->getOriginouAjuste();
    $numero_ro_debito = $coluna->getNumeroRoDebito();
    $data_pagamento_ajuste = $coluna->getDataPagamentoAjuste();
    $sinal_ajuste_debito = $coluna->getSinalAjusteDebito();
    $valor_ajute_debito = $coluna->getValorAjusteDebito();
    $sinal_compensado = $coluna->getSinalCompensado();
    $valor_compensado = $coluna->getvalorCompensado();
    $sinal_saldo_antecipado = $coluna->getSinalSaldoAntecipado();
    $valor_saldo_antecipado = $coluna->getValorSaldoAntecipado();
    $reservado = $coluna->getReservado();
    $integracoes_id = $coluna->getIntegracoesId();

    $stmt = $pdo->prepare("INSERT INTO debitos_antecipados (tipo, codigo_comercial, numero_ro_original, numero_ro_antecipado,
        data_pagamento_ro, sinal_ro_antecipado, valor_ro_antecipado, originou_ajuste, numero_ro_debito, data_pagamento_ajuste,
        sinal_ajuste_debito, valor_ajuste_debito, sinal_compensado, valor_compensado, sinal_saldo_antecipado, valor_saldo_antecipado,
        reservado, integracoes_id)
    VALUES (:tipo, :codigo_comercial, :numero_ro_original, :numero_ro_antecipado, :data_pagamento_ro, :sinal_ro_antecipado,
        :valor_ro_antecipado, :originou_ajuste, :numero_ro_debito, :data_pagamento_ajuste, :sinal_ajuste_debito, :valor_ajuste_debito,
        :sinal_compensado, :valor_compensado, :sinal_saldo_antecipado, :valor_saldo_antecipado, :reservado, :integracoes_id)");

    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_comercial', $codigo_comercial, PDO::PARAM_STR);
    $stmt->bindParam(':numero_ro_original', $numero_ro_original, PDO::PARAM_STR);
    $stmt->bindParam(':numero_ro_antecipado', $numero_ro_antecipado, PDO::PARAM_INT);
    $stmt->bindParam(':data_pagamento_ro', $data_pagamento_ro, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_ro_antecipado', $sinal_ro_antecipado, PDO::PARAM_STR);
    $stmt->bindParam(':valor_ro_antecipado', $valor_ro_antecipado, PDO::PARAM_INT);
    $stmt->bindParam(':originou_ajuste', $originou_ajuste, PDO::PARAM_STR);
    $stmt->bindParam(':numero_ro_debito', $numero_ro_debito, PDO::PARAM_INT);
    $stmt->bindParam(':data_pagamento_ajuste', $data_pagamento_ajuste, PDO::PARAM_STR);
    $stmt->bindParam(':sinal_ajuste_debito', $sinal_ajuste_debito, PDO::PARAM_STR);
    $stmt->bindParam(':valor_ajuste_debito', $valor_ajuste_debito, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_compensado', $sinal_compensado, PDO::PARAM_STR);
    $stmt->bindParam(':valor_compensado', $valor_compensado, PDO::PARAM_INT);
    $stmt->bindParam(':sinal_saldo_antecipado', $sinal_saldo_antecipado, PDO::PARAM_STR);
    $stmt->bindParam(':valor_saldo_antecipado', $valor_saldo_antecipado, PDO::PARAM_INT);
    $stmt->bindParam(':reservado', $reservado, PDO::PARAM_STR);
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'debitos antecipados' inserido com sucesso.", true) : retorno($stmt->errorInfo())."</br></br>";
}


function inserirTrailerTivit($pdo, $coluna)
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
    $stmt->bindParam(':integracoes_id', $integracoes_id, PDO::PARAM_INT);

    echo ($stmt->execute()) ? retorno("Extrato 'trailer' inserido com sucesso.", true) : retorno($stmt->errorInfo());}


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