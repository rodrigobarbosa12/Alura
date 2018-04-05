<?php

class Orcamento {
    private $valor; 
    private $itens;

    function __construct($novoValor){
        $this->valor = $novoValor;
        $this->itens = array(); // LISTA DE ITENS VASIA
    }




    //DISPONIBILIZA PARA QUEM ACESSA ESSE OBJETO DE FORA
    public function addItens(Item $novoItem){
        $this->itens[] = $novoItem;
    }

    public function getItens(){
        return $this->itens;
    }
    public function getValor(){
        return $this->valor;
    }
}

