<?php 

class Moderado implements Conta{
    private $aleatorio;

    public function calcula(Conta $conta){
        $this->aleatorio = mt_rand(1,100); //mt_rand(1,100) gera um numero aleatoria entre 1 e 100 
        if($aleatorio >= 50) return $conta->getSaldo() * 0.02;
        else return $conta->getValor() * 0.007;
    }
}