<?php

class Colunas {

        //121 colunas

//Cabeçalho
    public $tipo;
    public $estabelecimento;
    public $data_criacao;
    public $data_inicial;
    public $data_final;
    public $sequencia;
    public $adquirente;
    public $opcao_extrato;
    public $van;
    public $caixa_postal;
    public $versao_layout;
    public $reservado;

//Resumo
    public $codigo_comercial;
    public $numero_rv;
    public $parcela_rv;
    public $filler;
    public $quantidade_parcelas_rv;
    public $tipo_transacao;
    public $data_rv;
    public $data_pagamento_rv;
    public $data_envio;
    public $sinal_bruto;
    public $valor_bruto;
    public $sinal_comissao;
    public $valor_comissao;
    public $sinal_rejeitado;
    public $valor_rejeitado;
    public $sinal_liquido;
    public $valor_liquido;
    public $banco;
    public $agencia;
    public $conta_corrente;
    public $status;
    public $cv_aceitos;
    public $cv_rejeitados;
    public $id_revenda;
    public $data_transacao;
    public $tipo_ajuste;
    public $valor_saque;
    public $id_antecipacao;
    public $operacao_antecipacao;
    public $sinal_bruto_antecipacao;
    public $bruto_antecipacao;
    public $bandeira;
    public $numero_unico_rv;
    public $taxa_comissao;
    public $tarifa;
    public $taxa_garantia;
    public $captura;
    public $numero_logico_terminal;
    public $codigo_produto;

//Comprovante
    public $numero_cartao;
    public $sinal_compra_parcela;
    public $compra_parcela;
    public $parcela_cv;
    public $parcelas;
    public $motivo_rejeicao;
    public $autorizacao;
    public $tid;
    public $nsu;
    public $valor_transacao;
    public $digitos_cartao;
    public $total_parcelado;
    public $proxima_parcela;
    public $nota_fiscal;
    public $emissor;
    public $codigo_terminal;
    public $taxa_embarque;
    public $codigo_referencia;
    public $hora_transacao;
    public $id_transacao;
    public $id_cielo_promo;

//Antecipação
    public $data_credito;
    public $sinal_bruto_avista;
    public $valor_bruto_avista;
    public $sinal_bruto_parcelado;
    public $valor_bruto_parcelado;
    public $sinal_bruto_pre;
    public $valor_bruto_pre;
    public $sinal_bruto_total;
    public $valor_bruto_total;
    public $sinal_liquido_avista;
    public $valor_liquido_avista;
    public $sinal_liquido_parcelado;
    public $valor_liquido_parcelado;
    public $sinal_liquido_pre;
    public $valor_liquido_pre;
    public $sinal_liquido_total;
    public $valor_liquido_total;
    public $taxa_antecipacao;
    public $banco_domicilio;
    public $agencia_domicilio;
    public $conta_domicilio;
    public $liquido_antecipacao;

//Ros antecipados
    public $numero_operacao;
    public $data_vencimento_ro;
    public $parcela_antecipada;
    public $total_parcelas;
    public $sinal_bruto_original;
    public $valor_bruto_original;
    public $sinal_liquido_original;
    public $valor_liquido_original;
    public $valor_bruto_antecipacao;
    public $sinal_liquido_antecipacao;
    public $valor_liquido_antecipacao;
    public $numero_ro;

//Debitos antecipados
    public $numero_ro_original;
    public $numero_ro_antecipado;
    public $data_pagamento_ro;
    public $sinal_ro_antecipado;
    public $valor_ro_antecipado;
    public $originou_ajuste;
    public $numero_ro_debito;
    public $data_pagamento_ajuste;
    public $sinal_ajuste_debito;
    public $valor_ajuste_debito;
    public $sinal_compensado;
    public $valor_compensado;
    public $sinal_saldo_antecipado;
    public $valor_saldo_antecipado;

//Trailer
    public $quantidade_registro;

    public $integracoes_id;


//Cabeçalho
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getEstabelecimento()
    {
        return $this->estabelecimento;
    }
    public function getDataCriacao()
    {
        return $this->data_criacao;
    }
    public function getDataInicial()
    {
        return $this->data_inicial;
    }
    public function getDataFinal()
    {
        return $this->data_final;
    }
    public function getSequencia()
    {
        return $this->sequencia;
    }
    public function getAdquirente()
    {
        return $this->adquirente;
    }
    public function getOpcaoExtrato()
    {
        return $this->opcao_extrato;
    }
    public function getVan()
    {
        return $this->van;
    }
    public function getCaixaPostal()
    {
        return $this->caixa_postal;
    }
    public function getVersaoLayout()
    {
        return $this->versao_layout;
    }
    public function getReservado()
    {
        return $this->reservado;
    }

    public function setTipo($tipo)
    {
        return $this->tipo = $tipo;
    }
    public function setEstabelecimento($estabelecimento)
    {
        return $this->estabelecimento = $estabelecimento;
    }
    public function setDataCriacao($data_criacao)
    {
        return $this->data_criacao = $data_criacao;
    }
    public function setDataInicial($data_inicial)
    {
        return $this->data_inicial = $data_inicial;
    }
    public function setDataFinal($data_final)
    {
        return $this->data_final = $data_final;
    }
    public function setSequencia($sequencia)
    {
        return $this->sequencia = $sequencia;
    }
    public function setAdquirente($adquirente)
    {
        return $this->adquirente = $adquirente;
    }
    public function setOpcaoExtrato($opcao_extrato)
    {
        return $this->opcao_extrato = $opcao_extrato;
    }
    public function setVan($van)
    {
        return $this->van = $van;
    }
    public function setCaixaPostal($caixa_postal)
    {
        return $this->caixa_postal = $caixa_postal;
    }
    public function setVersaoLayout($versao_layout)
    {
        return $this->versao_layout = $versao_layout;
    }
    public function setReservado($reservado)
    {
        return $this->reservado = $reservado;
    }

//Resumo
    public function getCodigoComercial()
    {
        return $this->codigo_comercial;
    }
    public function getNumeroRv()
    {
        return $this->numero_rv;
    }
    public function getParcelaRv()
    {
        return $this->parcela_rv;
    }
    public function getFiller()
    {
        return $this->filler;
    }
    public function getQuantidadeParcelasRv()
    {
        return $this->quantidade_parcelas_rv;
    }
    public function getTipoTransacao()
    {
        return $this->tipo_transacao;
    }
    public function getDataRv()
    {
        return $this->data_rv;
    }
    public function getDataPagamentoRv()
    {
        return $this->data_pagamento_rv;
    }
    public function getDataEnvio()
    {
        return $this->data_envio;
    }
    public function getSinalBruto()
    {
        return $this->sinal_bruto;
    }
    public function getValorBruto()
    {
        return $this->valor_bruto;
    }
    public function getSinalComissao()
    {
        return $this->sinal_comissao;
    }
    public function getValorComissao()
    {
        return $this->valor_comissao;
    }
    public function getSinalRejeitado()
    {
        return $this->sinal_rejeitado;
    }
    public function getValorRejeitado()
    {
        return $this->valor_rejeitado;
    }
    public function getSinalLiquido()
    {
        return $this->sinal_liquido;
    }
    public function getValorLiquido()
    {
        return $this->valor_liquido;
    }
    public function getBanco()
    {
        return $this->banco;
    }
    public function getAgencia()
    {
        return $this->agencia;
    }
    public function getContaCorrente()
    {
        return $this->conta_corrente;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getCvAceitos()
    {
        return $this->cv_aceitos;
    }
    public function getCvRejeitados()
    {
        return $this->cv_rejeitados;
    }
    public function getIdRevenda()
    {
        return $this->id_revenda;
    }
    public function getDataTransacao()
    {
        return $this->data_transacao;
    }
    public function getTipoAjuste()
    {
        return $this->tipo_ajuste;
    }
    public function getValorSaque()
    {
        return $this->valor_saque;
    }
    public function getIdAntecipacao()
    {
        return $this->id_antecipacao;
    }
    public function getOperacaoAntecipacao()
    {
        return $this->operacao_antecipacao;
    }
    public function getSinalBrutoAntecipacao()
    {
        return $this->sinal_bruto_antecipacao;
    }
    public function getBrutoAntecipacao()
    {
        return $this->bruto_antecipacao;
    }
    public function getBandeira()
    {
        return $this->bandeira;
    }
    public function getNumeroUnicoRv()
    {
        return $this->numero_unico_rv;
    }
    public function getTaxaComissao()
    {
        return $this->taxa_comissao;
    }
    public function getTarifa()
    {
        return $this->tarifa;
    }
    public function getTaxaGarantia()
    {
        return $this->taxa_garantia;
    }
    public function getCaptura()
    {
        return $this->captura;
    }
    public function getNumeroLogicoTerminal()
    {
        return $this->numero_logico_terminal;
    }
    public function getCodigoProduto()
    {
        return $this->codigo_produto;
    }

    public function setCodigoComercial($codigo_comercial)
    {
        return $this->codigo_comercial = $codigo_comercial;
    }
    public function setNumeroRv($numero_rv)
    {
        return $this->numero_rv = $numero_rv;
    }
    public function setParcelaRv($parcela_rv)
    {
        return $this->parcela_rv = $parcela_rv;
    }
    public function setFiller($filler)
    {
        return $this->filler = $filler;
    }
    public function setQuantidadeParcelasRv($quantidade_parcelas_rv)
    {
        return $this->quantidade_parcelas_rv = $quantidade_parcelas_rv;
    }
    public function setTipoTransacao($tipo_transacao)
    {
        return $this->tipo_transacao = $tipo_transacao;
    }
    public function setDataRv($data_rv)
    {
        return $this->data_rv = $data_rv;
    }
    public function setDataPagamentoRv($data_pagamento_rv)
    {
        return $this->data_pagamento_rv = $data_pagamento_rv;
    }
    public function setDataEnvio($data_envio)
    {
        return $this->data_envio = $data_envio;
    }
    public function setSinalBruto($sinal_bruto)
    {
        return $this->sinal_bruto = $sinal_bruto;
    }
    public function setValorBruto($valor_bruto)
    {
        return $this->valor_bruto = $valor_bruto;
    }
    public function setSinalComissao($sinal_comissao)
    {
        return $this->sinal_comissao = $sinal_comissao;
    }
    public function setValorComissao($valor_comissao)
    {
        return $this->valor_comissao = $valor_comissao;
    }
    public function setSinalRejeitado($sinal_rejeitado)
    {
        return $this->sinal_rejeitado = $sinal_rejeitado;
    }
    public function setValorRejeitado($valor_rejeitado)
    {
        return $this->valor_rejeitado = $valor_rejeitado;
    }
    public function setSinalLiquido($sinal_liquido)
    {
        return $this->sinal_liquido = $sinal_liquido;
    }
    public function setValorLiquido($valor_liquido)
    {
        return $this->valor_liquido = $valor_liquido;
    }
    public function setBanco($banco)
    {
        return $this->banco = $banco;
    }
    public function setAgencia($agencia)
    {
        return $this->agencia = $agencia;
    }
    public function setContaCorrente($conta_corrente)
    {
        return $this->conta_corrente = $conta_corrente;
    }
    public function setStatus($status)
    {
        return $this->status = $status;
    }
    public function setCvAceitos($cv_aceitos)
    {
        return $this->cv_aceitos = $cv_aceitos;
    }
    public function setCvRejeitados($cv_rejeitados)
    {
        return $this->cv_rejeitados = $cv_rejeitados;
    }
    public function setIdRevenda($id_revenda)
    {
        return $this->id_revenda = $id_revenda;
    }
    public function setDataTransacao($data_transacao)
    {
        return $this->data_transacao = $data_transacao;
    }
    public function setTipoAjuste($tipo_ajuste)
    {
        return $this->tipo_ajuste = $tipo_ajuste;
    }
    public function setValorSaque($valor_saque)
    {
        return $this->valor_saque = $valor_saque;
    }
    public function setIdAntecipacao($id_antecipacao)
    {
        return $this->id_antecipacao = $id_antecipacao;
    }
    public function setOperacaoAntecipacao($operacao_antecipacao)
    {
        return $this->operacao_antecipacao = $operacao_antecipacao;
    }
    public function setSinalBrutoAntecipacao($sinal_bruto_antecipacao)
    {
        return $this->sinal_bruto_antecipacao = $sinal_bruto_antecipacao;
    }
    public function setBrutoAntecipacao($bruto_antecipacao)
    {
        return $this->bruto_antecipacao = $bruto_antecipacao;
    }
    public function setBandeira($bandeira)
    {
        return $this->bandeira = $bandeira;
    }
    public function setNumeroUnicoRv($numero_unico_rv)
    {
        return $this->numero_unico_rv = $numero_unico_rv;
    }
    public function setTaxaComissao($taxa_comissao)
    {
        return $this->taxa_comissao = $taxa_comissao;
    }
    public function setTarifa($tarifa)
    {
        return $this->tarifa = $tarifa;
    }
    public function setTaxaGarantia($taxa_garantia)
    {
        return $this->taxa_garantia = $taxa_garantia;
    }
    public function setCaptura($captura)
    {
        return $this->captura = $captura;
    }
    public function setNumeroLogicoTerminal($numero_logico_terminal)
    {
        return $this->numero_logico_terminal = $numero_logico_terminal;
    }
    public function setCodigoProduto($codigo_produto)
    {
        return $this->codigo_produto = $codigo_produto;
    }

//Comprovante

    function getNumeroCartao()
    {
        return $this->numero_cartao;
    }
    function getSinalCompraParcelada()
    {
        return $this->sinal_compra_parcela;
    }
    function getCompraParcelada()
    {
        return $this->compra_parcela;
    }
    function getParcelaCv()
    {
        return $this->parcela_cv;
    }
    function getParcelas()
    {
        return $this->parcelas;
    }
    function getMotivoRejeicao()
    {
        return $this->motivo_rejeicao;
    }
    function getAutorizacao()
    {
        return $this->autorizacao;
    }
    function getTid()
    {
        return $this->tid;
    }
    function getNsu()
    {
        return $this->nsu;
    }
    function getValorTransacao()
    {
        return $this->valor_transacao;
    }
    function getDigitosCartao()
    {
        return $this->digitos_cartao;
    }
    function getTotalParcelado()
    {
        return $this->total_parcelado;
    }
    function getProximaParcela()
    {
        return $this->proxima_parcela;
    }
    function getNotaFiscal()
    {
        return $this->nota_fiscal;
    }
    function getEmissor()
    {
        return $this->emissor;
    }
    function getCodigoTerminal()
    {
        return $this->codigo_terminal;
    }
    function getTaxaEmbarque()
    {
        return $this->taxa_embarque;
    }
    function getCodigoReferencia()
    {
        return $this->codigo_referencia;
    }
    function getHoraTransacao()
    {
        return $this->hora_transacao;
    }
    function getIdTransacao()
    {
        return $this->id_transacao;
    }
    function getIdCieloPromo()
    {
        return $this->id_cielo_promo;
    }


    function setNumeroCartao($numero_cartao)
    {
        return $this->numero_cartao = $numero_cartao;
    }
    function setSinalCompraParcelada($sinal_compra_parcela)
    {
        return $this->sinal_compra_parcela = $sinal_compra_parcela;
    }
    function setCompraParcelada($compra_parcela)
    {
        return $this->compra_parcela = $compra_parcela;
    }
    function setParcelaCv($parcela_cv)
    {
        return $this->parcela_cv = $parcela_cv;
    }
    function setParcelas($parcelas)
    {
        return $this->parcelas = $parcelas;
    }
    function setMotivoRejeicao($motivo_rejeicao)
    {
        return $this->motivo_rejeicao = $motivo_rejeicao;
    }
    function setAutorizacao($autorizacao)
    {
        return $this->autorizacao = $autorizacao;
    }
    function setTid($tid)
    {
        return $this->tid = $tid;
    }
    function setNsu($nsu)
    {
        return $this->nsu = $nsu;
    }
    function setValorTransacao($valor_transacao)
    {
        return $this->valor_transacao = $valor_transacao;
    }
    function setDigitosCartao($digitos_cartao)
    {
        return $this->digitos_cartao = $digitos_cartao;
    }
    function setTotalParcelado($total_parcelado)
    {
        return $this->total_parcelado = $total_parcelado;
    }
    function setProximaParcela($proxima_parcela)
    {
        return $this->proxima_parcela = $proxima_parcela;
    }
    function setNotaFiscal($nota_fiscal)
    {
        return $this->nota_fiscal = $nota_fiscal;
    }
    function setEmissor($emissor)
    {
        return $this->emissor = $emissor;
    }
    function setCodigoTerminal($codigo_terminal)
    {
        return $this->codigo_terminal = $codigo_terminal;
    }
    function setTaxaEmbarque($taxa_embarque)
    {
        return $this->taxa_embarque = $taxa_embarque;
    }
    function setCodigoReferencia($codigo_referencia)
    {
        return $this->codigo_referencia = $codigo_referencia;
    }
    function setHoraTransacao($hora_transacao)
    {
        return $this->hora_transacao = $hora_transacao;
    }
    function setIdTransacao($id_transacao)
    {
        return $this->id_transacao = $id_transacao;
    }
    function setIdCieloPromo($id_cielo_promo)
    {
        return $this->id_cielo_promo = $id_cielo_promo;
    }

//Antecipacao

    function getDataCredito()
    {
        return $this->data_credito;
    }

    function getsinalBrutoAvista()
    {
        return $this->sinal_bruto_avista;
    }

    function getValorBrutoAvista()
    {
        return $this->valor_bruto_avista;
    }

    function getSinalBrutoParcelado()
    {
        return $this->sinal_bruto_parcelado;
    }

    function getValorBrutoParcelado()
    {
        return $this->valor_bruto_parcelado;
    }

    function getSinalBrutoPre()
    {
        return $this->sinal_bruto_pre;
    }

    function getValorBrutoPre()
    {
        return $this->valor_bruto_pre;
    }

    function getSinalBrutoTotal()
    {
        return $this->sinal_bruto_total;
    }

    function getValorBrutoTotal()
    {
        return $this->valor_bruto_total;
    }

    function getSinalLiquidoAvista()
    {
        return $this->sinal_liquido_avista;
    }

    function getValorLiquidoAvista()
    {
        return $this->valor_liquido_avista;
    }

    function getSinalLiquidoParcelado()
    {
        return $this->sinal_liquido_parcelado;
    }

    function getValorLiquidoParcelado()
    {
        return $this->valor_liquido_parcelado;
    }

    function getSinalLiquidoPre()
    {
        return $this->sinal_liquido_pre;
    }

    function getValorLiquidoPre()
    {
        return $this->valor_liquido_pre;
    }

    function getSinalLiquidoTotal()
    {
        return $this->sinal_liquido_total;
    }

    function getValorLiquidoTotal()
    {
        return $this->valor_liquido_total;
    }

    function getTaxaAntecipacao()
    {
        return $this->taxa_antecipacao;
    }

    function getBancoDomicilio()
    {
        return $this->banco_domicilio;
    }

    function getAgenciaDomicilio()
    {
        return $this->agencia_domicilio;
    }

    function getContaDomicilio()
    {
        return $this->conta_domicilio;
    }

    function getLiquidoAntecipacao()
    {
        return $this->liquido_antecipacao;
    }


    function setDataCredito($data_credito)
    {
        return $this->data_credito = $data_credito;
    }

    function setsinalBrutoAvista($sinal_bruto_avista)
    {
        return $this->sinal_bruto_avista = $sinal_bruto_avista;
    }

    function setValorBrutoAvista($valor_bruto_avista)
    {
        return $this->valor_bruto_avista = $valor_bruto_avista;
    }

    function setSinalBrutoParcelado($sinal_bruto_parcelado)
    {
        return $this->sinal_bruto_parcelado = $sinal_bruto_parcelado;
    }

    function setValorBrutoParcelado($valor_bruto_parcelado)
    {
        return $this->valor_bruto_parcelado = $valor_bruto_parcelado;
    }

    function setSinalBrutoPre($sinal_bruto_pre)
    {
        return $this->sinal_bruto_pre = $sinal_bruto_pre;
    }

    function setValorBrutoPre($valor_bruto_pre)
    {
        return $this->valor_bruto_pre = $valor_bruto_pre;
    }

    function setSinalBrutoTotal($sinal_bruto_total)
    {
        return $this->sinal_bruto_total = $sinal_bruto_total;
    }

    function setValorBrutoTotal($valor_bruto_total)
    {
        return $this->valor_bruto_total = $valor_bruto_total;
    }

    function setSinalLiquidoAvista($sinal_liquido_avista)
    {
        return $this->sinal_liquido_avista = $sinal_liquido_avista;
    }

    function setValorLiquidoAvista($valor_liquido_avista)
    {
        return $this->valor_liquido_avista = $valor_liquido_avista;
    }

    function setSinalLiquidoParcelado($sinal_liquido_parcelado)
    {
        return $this->sinal_liquido_parcelado = $sinal_liquido_parcelado;
    }

    function setValorLiquidoParcelado($valor_liquido_parcelado)
    {
        return $this->valor_liquido_parcelado = $valor_liquido_parcelado;
    }

    function setSinalLiquidoPre($sinal_liquido_pre)
    {
        return $this->sinal_liquido_pre = $sinal_liquido_pre;
    }

    function setValorLiquidoPre($valor_liquido_pre)
    {
        return $this->valor_liquido_pre = $valor_liquido_pre;
    }

    function setValorLiquidoTotal($sinal_liquido_total)
    {
        return $this->sinal_liquido_total = $sinal_liquido_total;
    }

    function setSinalLiquidoTotal($valor_liquido_total)
    {
        return $this->valor_liquido_total = $valor_liquido_total;
    }

    function setTaxaAntecipacao($taxa_antecipacao)
    {
        return $this->taxa_antecipacao = $taxa_antecipacao;
    }

    function setBancoDomicilio($banco_domicilio)
    {
        return $this->banco_domicilio = $banco_domicilio;
    }

    function setAgenciaDomicilio($agencia_domicilio)
    {
        return $this->agencia_domicilio = $agencia_domicilio;
    }

    function setContaDomicilio($conta_domicilio)
    {
        return $this->conta_domicilio = $conta_domicilio;
    }

    function setLiquidoAntecipacao($liquido_antecipacao)
    {
        return $this->liquido_antecipacao = $liquido_antecipacao;
    }

//Ros antecipados

    function getNumeroOperacao()
    {
        return $this->numero_operacao;
    }
    function getDataVencimentoRo()
    {
        return $this->data_vencimento_ro;
    }
    function getparcela_antecipada()
    {
        return $this->parcela_antecipada;
    }
    function getTotalParcelas()
    {
        return $this->total_parcelas;
    }
    function getSinalBrutoOriginal()
    {
        return $this->sinal_bruto_original;
    }
    function getValorBrutoOriginal()
    {
        return $this->valor_bruto_original;
    }
    function getSinalLiquidoOriginal()
    {
        return $this->sinal_liquido_original;
    }
    function getValorLiquidoOriginal()
    {
        return $this->valor_liquido_original;
    }
    function getValorBrutoAntecipacao()
    {
        return $this->valor_bruto_antecipacao;
    }
    function getSinalLiquidoAntecipacao()
    {
        return $this->sinal_liquido_antecipacao;
    }
    function getValorLiquidoAntecipacao()
    {
        return $this->valor_liquido_antecipacao;
    }
    function getNumeroRo()
    {
        return $this->numero_ro;
    }

//Debitos antecipados

    function getNumeroRoOriginal()
    {
        return $this->numero_ro_original;
    }
    function getNumeroRoAntecipado()
    {
        return $this->numero_ro_antecipado;
    }
    function getDataPagamentoRo()
    {
        return $this->data_pagamento_ro;
    }
    function getSinalRoAntecipado()
    {
        return $this->sinal_ro_antecipado;
    }
    function getValorRoAntecipado()
    {
        return $this->valor_ro_antecipado;
    }
    function getOriginouAjuste()
    {
        return $this->originou_ajuste;
    }
    function getNumeroRoDebito()
    {
        return $this->numero_ro_debito;
    }
    function getDataPagamentoAjuste()
    {
        return $this->data_pagamento_ajuste;
    }
    function getSinalAjusteDebito()
    {
        return $this->sinal_ajuste_debito;
    }
    function getValorAjusteDebito()
    {
        return $this->valor_ajuste_debito;
    }
    function getSinalCompensado()
    {
        return $this->sinal_compensado;
    }
    function getValorCompensado()
    {
        return $this->valor_compensado;
    }
    function getSinalSaldoAntecipado()
    {
        return $this->sinal_saldo_antecipado;
    }
    function getValorSaldoAntecipado()
    {
        return $this->valor_saldo_antecipado;
    }


       function setNumeroRoOriginal($numero_ro_original)
    {
        return $this->numero_ro_original = $numero_ro_original;
    }
    function setNumeroRoAntecipado($numero_ro_antecipado)
    {
        return $this->numero_ro_antecipado = $numero_ro_antecipado;
    }
    function setDataPagamentoRo($data_pagamento_ro)
    {
        return $this->data_pagamento_ro = $data_pagamento_ro;
    }
    function setSinalRoAntecipado($sinal_ro_antecipado)
    {
        return $this->sinal_ro_antecipado = $sinal_ro_antecipado;
    }
    function setValorRoAntecipado($valor_ro_antecipado)
    {
        return $this->valor_ro_antecipado = $valor_ro_antecipado;
    }
    function setOriginouAjuste($originou_ajuste)
    {
        return $this->originou_ajuste = $originou_ajuste;
    }
    function setNumeroRoDebito($numero_ro_debito)
    {
        return $this->numero_ro_debito = $numero_ro_debito;
    }
    function setDataPagamentoAjuste($data_pagamento_ajuste)
    {
        return $this->data_pagamento_ajuste = $data_pagamento_ajuste;
    }
    function setSinalAjusteDebito($sinal_ajuste_debito)
    {
        return $this->sinal_ajuste_debito = $sinal_ajuste_debito;
    }
    function setValorAjusteDebito($valor_ajuste_debito)
    {
        return $this->valor_ajuste_debito = $valor_ajuste_debito;
    }
    function setSinalCompensado($sinal_compensado)
    {
        return $this->sinal_compensado = $sinal_compensado;
    }
    function setValorCompensado($valor_compensado)
    {
        return $this->valor_compensado = $valor_compensado;
    }
    function setSinalSaldoAntecipado($sinal_saldo_antecipado)
    {
        return $this->sinal_saldo_antecipado = $sinal_saldo_antecipado;
    }
    function setValorSaldoAntecipado($valor_saldo_antecipado)
    {
        return $this->valor_saldo_antecipado = $valor_saldo_antecipado;
    }

//Trailer
    function getQuantidadeRegistro()
    {
        return $this->quantidade_registro;
    }

    function setQuantidadeRegistro($quantidade_registro)
    {
        return $this->quantidade_registro = $quantidade_registro;
    }

    function getIntegracoesId()
    {
        return $this->integracoes_id;
    }

    function setIntegracoesId($integracoes_id)
    {
        return $this->integracoes_id = $integracoes_id;
    }


}














