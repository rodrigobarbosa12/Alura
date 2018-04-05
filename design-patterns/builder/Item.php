<?php 

    class Item {
        private $nome;
        private $valor;

        //Esse item é obrigado a ter um nome e um valor
        function __construct($novoNome, $novoValor){
            $this->nome = $novoNome;
            $this->valoe = $novoValor;
        }

        function getNome(){
            return $this->nome;
        }
        function getValor(){
            return $this->valor;
        }

    }