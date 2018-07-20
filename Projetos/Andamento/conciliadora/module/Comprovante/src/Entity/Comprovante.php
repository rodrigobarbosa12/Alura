<?php

namespace Comprovante\Entity;

use Application\Entity\AbstractEntity;

class Comprovante extends AbstractEntity
{
    public $id;
    public $tipo;
    public $codigo_comercial;
    public $estabelecimento;
    public $reservado;
    public $integracoes_id;
    public $header_id;
    public $numero_cartao;
    public $sinal_compra_parcela;
    public $compra_parcela;
    public $parcela_cv;
    public $valor_parcela;
    public $data_pagamento;
    public $parcelas;
    public $motivo_rejeicao;
    public $autorizacao;
    public $centralizador_pagamentos;
    public $tid;
    public $nsu;
    public $valor_transacao;
    public $valor_transacao_saque;
    public $digitos_cartao;
    public $total_parcelado;
    public $proxima_parcela;
    public $nota_fiscal;
    public $emissor;
    public $carteira;
    public $codigo_terminal;
    public $taxa_embarque;
    public $codigo_referencia;
    public $hora_transacao;
    public $id_transacao;
    public $id_cielo_promo;

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
    function getNumeroCartao()
    {
        return $this->numero_cartao;
    }
    function getSinalCompraParcela()
    {
        return $this->sinal_compra_parcela;
    }
    function getCompraParcela()
    {
        return $this->compra_parcela;
    }
    function getParcelaCv()
    {
        return $this->parcela_cv;
    }
    function getValorParcela()
    {
        return $this->valor_parcela;
    }
    function getDataPagamento()
    {
        return $this->data_pagamento;
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
    function getCentralizadorPagamentos()
    {
        return $this->centralizador_pagamentos;
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
    function getValorTransacaoSaque()
    {
        return $this->valor_transacao_saque;
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
    function getCarteira()
    {
        return $this->carteira;
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
    function setSinalCompraParcela($sinal_compra_parcela)
    {
        return $this->sinal_compra_parcela = $sinal_compra_parcela;
    }
    function setCompraParcela($compra_parcela)
    {
        return $this->compra_parcela = $compra_parcela;
    }
    function setParcelaCv($parcela_cv)
    {
        return $this->parcela_cv = $parcela_cv;
    }
    function setValorParcela($valor_parcela)
    {
        return $this->valor_parcela = $valor_parcela;
    }
    function setDataPagamento($data_pagamento)
    {
        return $this->data_pagamento = $data_pagamento;
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
    function setCentralizadorPagamentos($centralizador_pagamentos)
    {
        return $this->centralizador_pagamentos = $centralizador_pagamentos;
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
    function setValorTransacaoSaque($valor_transacao_saque)
    {
        return $this->valor_transacao_saque = $valor_transacao_saque;
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
    function setCarteira($carteira)
    {
        return $this->carteira = $carteira;
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
    public function setTipo($tipo)
    {
        return $this->tipo = $tipo;
    }
    public function setCodigoComercial($codigo_comercial)
    {
        return $this->codigo_comercial = $codigo_comercial;
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
    public function setId($id)
    {
        return $this->id = $id;
    }
}