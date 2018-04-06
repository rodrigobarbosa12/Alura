<?php 

class Estado 
{
    private $contrato;

    public function __construct($contrato) 
    {
        $this->contrato = $contrato;
    }

    public function getEstado() 
    {
        return $this->contrato;
    }

}