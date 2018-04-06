<?php 

class Soma implements Expressao {

    private $esquerda;
    private $direita;

    function __construct($esquerda, $direita){
        $this->esquerda = $esquerda;
        $this->direita = $direita;
    }

    public function avalia(){
        $resultadoDaEsquerda = $this->esquerda->avalia();
        $resultadoDaDireita = $this->direita->avalia();
        return $resultadoDaEsquerda + $resultadoDaDireita;
    }

   

}