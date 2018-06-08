<?php

class ISS extends Imposto{

    // function __construct(Imposto $outroImposto = null){
    //     parent::construct($outroImposto);
    // }

    public function calcula(Orcamento $orcamento){
        return $orcamento->getValor() * 0.06 + $this->calculoDoOutroImposto($orcamento);
    }
    // private function calculoDoOutroImposto($orcamento) {
    //     return $this->outroImposto->calcula($orcamento);
    //   }
}