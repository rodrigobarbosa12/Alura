<?php //CLASSE FILHA DO TEMPLATE

require_once("templateImpostoCondicional.php");

class ImpostoY extends TemplateDeImpostoCondicional {

      public function deveUsarMaximaTaxacao(Orcamento $orcamento) {
        return $orcamento->getValor() >= 500 && $this->temItemMaiorQue100ReaisNo($orcamento);
      }
      public function maximaTaxacao(Orcamento $orcamento) { 
        return $orcamento->getValor() * 0.10;  
      }
      public function minimaTaxacao(Orcamento $orcamento) {
        return $orcamento->getValor() * 0.06;
      }


      private function temItemMaiorQue100ReaisNo(Orcamento $orcamento) {
        foreach($orcamento->getItens() as $itens) {
          if($itens->getValor() > 100) return true;
        }
        return false;
      }
    }

