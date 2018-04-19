<?php

//  invoca a estratégia de imposto e retorna o resultado.

class CalculadoraDeImpostos{

    public function calcula(Orcamento $orcamento, Imposto $imposto){

        return $imposto->calcula($orcamento);

        }
    }

