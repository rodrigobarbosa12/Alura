<?php

namespace Resumo\Entity;

use Application\Entity\AbstractEntity;

class Resumo extends AbstractEntity
{
    public $id;
    public $tipo;
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
	public $taxa_desconto;
	public $rejeitado;
	public $credito;
	public $encargos;
	public $tipo_pagamento;
	public $codigo_estabelecimento;
	public $data_vencimento_rv;
	public $custo_operacao;
	public $liquido_rv_antecipado;
	public $controle_cobranca;
	public $liquido_cobranca;
	public $id_compensacao;
	public $moeda;
	public $baixa_cobranca_servico;
    public $sinal_transacao;
    public $estabelecimento;
    public $reservado;
    public $integracoes_id;
    public $header_id;


    public function getId()
    {
        return $this->id;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
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
    function getHoraCriacao()
    {
        return $this->hora_criacao;
    }
    function getDataReferencia()
    {
        return $this->data_referencia;
    }
    function getVersaoArquivo()
    {
        return $this->versao_arquivo;
    }
    function getCnpj()
    {
        return $this->cnpj;
    }
    function getCodigoAdquirente()
    {
        return $this->codigo_adquirente;
    }
    function getTaxaDesconto()
    {
        return $this->taxa_desconto;
    }
    function getRejeitado()
    {
        return $this->rejeitado;
    }
    function getCredito()
    {
        return $this->credito;
    }
    function getEncargos()
    {
        return $this->encargos;
    }
    function getTipoPagamento()
    {
        return $this->tipo_pagamento;
    }
    function getCodigoEstabelecimento()
    {
        return $this->codigo_estabelecimento;
    }
    function getDataVencimentoRv()
    {
        return $this->data_vencimento_rv;
    }
    function getCustoOperacao()
    {
        return $this->custo_operacao;
    }
    function getLiquidoRvAntecipado()
    {
        return $this->liquido_rv_antecipado;
    }
    function getControleCobranca()
    {
        return $this->controle_cobranca;
    }
    function getLiquidoCobranca()
    {
        return $this->liquido_cobranca;
    }
    function getIdCompensacao()
    {
        return $this->id_compensacao;
    }
    function getMoeda()
    {
        return $this->moeda;
    }
    function getBaixaCobrancaServico()
    {
        return $this->baixa_cobranca_servico;
    }
    function getSinalTransacao()
    {
        return $this->sinal_transacao;
    }
    public function getEstabelecimento()
    {
        return $this->estabelecimento;
    }
    public function getReservado()
    {
        return $this->reservado;
    }
    function getIntegracoesId()
    {
        return $this->integracoes_id;
    }
    function getHeaderId()
    {
        return $this->header_id;
    }



    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setTipo($tipo)
    {
        return $this->tipo = $tipo;
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
    function setHoraCriacao($hora_criacao)
    {
        return $this->hora_criacao = $hora_criacao;
    }
    function setDataReferencia($data_referencia)
    {
        return $this->data_referencia = $data_referencia;
    }
    function setVersaoArquivo($versao_arquivo)
    {
        return $this->versao_arquivo = $versao_arquivo;
    }
    function setCnpj($cnpj)
    {
        return $this->cnpj = $cnpj;
    }
    function setCodigoAdquirente($codigo_adquirente)
    {
        return $this->codigo_adquirente = $codigo_adquirente;
    }
    function setTaxaDesconto($taxa_desconto)
    {
        return $this->taxa_desconto = $taxa_desconto;
    }
    function setRejeitado($rejeitado)
    {
        return $this->rejeitado = $rejeitado;
    }
    function setCredito($credito)
    {
        return $this->credito = $credito;
    }
    function setEncargos($encargos)
    {
        return $this->encargos = $encargos;
    }
    function setTipoPagamento($tipo_pagamento)
    {
        return $this->tipo_pagamento = $tipo_pagamento;
    }
    function setCodigoEstabelecimento($codigo_estabelecimento)
    {
        return $this->codigo_estabelecimento = $codigo_estabelecimento;
    }
    function setDataVencimentoRv($data_vencimento_rv)
    {
        return $this->data_vencimento_rv = $data_vencimento_rv;
    }
    function setCustoOperacao($custo_operacao)
    {
        return $this->custo_operacao = $custo_operacao;
    }
    function setLiquidoRvAntecipado($liquido_rv_antecipado)
    {
        return $this->liquido_rv_antecipado = $liquido_rv_antecipado;
    }
    function setControleCobranca($controle_cobranca)
    {
        return $this->controle_cobranca = $controle_cobranca;
    }
    function setLiquidoCobranca($liquido_cobranca)
    {
        return $this->liquido_cobranca = $liquido_cobranca;
    }
    function setIdCompensacao($id_compensacao)
    {
        return $this->id_compensacao = $id_compensacao;
    }
    function setMoeda($moeda)
    {
        return $this->moeda = $moeda;
    }
    function setBaixaCobrancaServico($baixa_cobranca_servico)
    {
        return $this->baixa_cobranca_servico = $baixa_cobranca_servico;
    }
    function setSinalTransacao($sinal_transacao)
    {
        return $this->sinal_transacao = $sinal_transacao;
    }
    public function setEstabelecimento($estabelecimento)
    {
        return $this->estabelecimento = $estabelecimento;
    }
    public function setReservado($reservado)
    {
        return $this->reservado = $reservado;
    }
    function setIntegracoesId($integracoes_id)
    {
        return $this->integracoes_id = $integracoes_id;
    }
    function setHeaderId($header_id)
    {
        return $this->header_id = $header_id;
    }
}