<?php

class Multiplicacao implements Operacoes
{
    public function calcular(Valor $valor)
    {
        return $valor->getValor1() * $valor->getValor2();
    }
}