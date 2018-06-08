<?php 

//Aqui fica salvos todos os contratos dentro do array

class Historico {
    private $estadosSalvos;

    function __construct(){
        $this->estadosSalvos = array();
    }
    public function pega($index){
        return $this->estadosSalvos[$index];
    }
    public function adiciona($estado){
        $this->estadosSalvos[] = $estado;
    }

}