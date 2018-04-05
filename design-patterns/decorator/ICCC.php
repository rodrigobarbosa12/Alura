<?php 

class ICCC extends Imposto{

    // function __construct(Imposto $outroImposto = null){
    //     parent::construct($outroImposto);
    // }

    public function calcula(Orcamento $orcamento){

    if($orcamento->getValor() < 1000){
        return $orcamento->getValor() * 0.05;
    }else if($orcamento->getValor() >= 1000 && $orcamento->getValor() <= 3000){
        return $orcamento->getValor() * 0.07 + $this->calculoDoOutroImposto($orcamento);
    }else{
        return $orcamento->getValor() * 0.08 + 30 + $this->calculoDoOutroImposto($orcamento);
    }
  }
  
//   private function calculoDoOutroImposto($orcamento) {
//     return $this->outroImposto->calcula($orcamento);
//   }
}