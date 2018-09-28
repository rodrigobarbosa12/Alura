<?php

class CalculadorDeImpostos
{
    public function realizaCalculo(Orcamento $orcamento, Imposto $imposto)
    {
        return $imposto->calcula($orcamento);
    }
}