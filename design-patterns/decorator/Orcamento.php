<?php

class Orcamento {

    private $valor; 

    function __construct($novoValor){
        $this->valor = $novoValor;
    }

    public function getValor(){
        return $this->valor;
    }
}

