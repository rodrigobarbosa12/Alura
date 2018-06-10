<?php    //CLASS MAE

abstract class TemplateDeImpostoCondicional implements Imposto {

    public function calcula(Orcamento $orcamento) {

      if($this->deveUsarMaximaTaxacao($orcamento)) {
        return $this->maximaTaxacao($orcamento);
      } else {
        return $this->minimaTaxacao($orcamento);
      }
    }        

    public abstract function deveUsarMaximaTaxacao(Orcamento $orcamento);
    public abstract function maximaTaxacao(Orcamento $orcamento);
    public abstract function minimaTaxacao(Orcamento $orcamento);
}     