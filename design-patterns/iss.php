<?php 
#require("imposto.php");

class ISS implements Imposto{
    public function calcula(Orcamento $orcamento){
        return $orcamento->getValor() * 0.6;
    }
}