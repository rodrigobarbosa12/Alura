<?php

class KCV extends Imposto{

    // function __construct(Imposto $outroImposto = null){
    //     parent::construct($outroImposto);
    // }
    
    function calcula(Orcamento $orcamento){
        return $orcamento->getValor() * 0.2 + $this->calculoDoOutroImposto($orcamento);
    }
    // private function calculoDoOutroImposto($orcamento) {
    //     return $this->outroImposto->calcula($orcamento);
    //   }
}