<?php

class Calculador {

    public function calculadora(Valor $valor, Operacoes $operacoes)
    {
        return $operacoes->calcular($valor);
    }
}