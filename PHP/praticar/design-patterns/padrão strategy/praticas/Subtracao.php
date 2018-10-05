<?php

class Subtracao implements Operacoes
{
    public function calcular(Valor $valor)
    {
        return $valor->getValor1() - $valor->getValor2();
    }
}