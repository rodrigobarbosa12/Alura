<?php 


class Conservador implements Investimentos{

    public function calcula(Conta $conta){
        return $conta->getValor() * 0.008;
    }

}