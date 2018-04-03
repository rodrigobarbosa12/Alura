<?php

class Arrojado implements Conta{
    private $aleatorio;

    public function calcula(Conta $conta){
        $this->aleatorio = mt_rand(1,100); //mt_rand(1,100) gera um numero aleatoria entre 1 e 100 

        if($this->aleatorio = 1 && $this->aleatorio <= 20) return $conta->getSaldor() * 0.05;
        else if ($this->aleatorio > 20 && $this->aleatorio <= 50) return $conta->getValor() * 0.03;
        else return $conta->getSaldo() * 0.006;

    }
}