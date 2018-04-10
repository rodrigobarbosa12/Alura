<?php 

    class ContaComum {
    private $manipulador;

    public function __construct(){
        $this->manipulador = new ManipuladorDeSaldo();
    }

    public function saca($valor){
        $this->manipulador->saca($valor);
    }

    public function deposita($valor){
        $this->manipulador->deposita($valor);
    }

    public function getSaldo(){
        return $this->manipuladoraldo->getSaldo($saldo);
    }

    public function rende($taxa){
        $this->manipulador->rende(1.1);
    }
}