<?php 

class Subtracao implements Visitor {

    private $esquerda;
    private $direita;

    function __construct(Visitor $ladoEsquerdo, Visitor $ladoDireito){
        $this->esquerda = $ladoEsquerdo;
        $this->direita = $ladoDireito;
    }

    public function avalia(){
        $resultadoDaEsquerda = $this->esquerda->avalia();
        $resultadoDaDireita = $this->direita->avalia();
        return $resultadoDaEsquerda - $resultadoDaDireita;
    }


    public function getEsquerda(){
        return $this->esquerda;
    }
    public function getDireita(){
        return $this->direita;
    }

    public function aceita(Impressora $impressora){
        $impressora->visitaSubtracao($this);
    }
}