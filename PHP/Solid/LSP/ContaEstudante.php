<?php 

    class ContaEstudante{
    private $milhas;
    private $manipulador;

    public function __construct(){
        $this->manipulador = new ManipuladorDeSaldo();
    }
    public function deposita($valor){
        $this->deposita($valor);
        $this->milhas += $valor;
    }

    public function getMilhas(){
        return $this->milhas;
    }
}
