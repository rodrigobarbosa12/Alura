<?php

class Valor
{
    private $valor1;
    private $valor2;

    public function __construct($valor1, $valor2)
    {
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    public function getValor1()
    {
        return $this->valor1;
    }

    public function getValor2()
    {
        return $this->valor2;
    }
}