<?php

class Colunas {

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
//121 colunas

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
}