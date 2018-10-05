<?php

class Somar implements Operacoes
{
    public function calcular(Valor $valor)
    {
        return $valor->getValor1() + $valor->getValor2();
    }
}