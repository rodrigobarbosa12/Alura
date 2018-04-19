<?php //CLASSE MAE

abstract class Imposto {

    private $outroImposto;
    function construct(Imposto $outroImposto){
        $this->outroImposto = $outroImposto;
    }
    public abstract function calcula(Orcamento $orcamento);
    
    protected function calculoDoOutroImposto(Orcamento $orcamento) {
        // tratando o caso do proximo imposto nao existir!
        if(is_null($this->outroImposto)) return 0;
        return $this->outroImposto->calcula($orcamento);
      }

    
}
