<?php 

class Numero implements Visitor{
    private $numero;

    function __construct($numero){
        $this->numero =  $numero;
    }
    public function avalia() {
        return $this->numero;
    }

    public function getNumero(){
     return $this->numero;
    }
    

    public function aceita(Impressora $impressora){
        $impressora->visitaNumero($this);
    }


}