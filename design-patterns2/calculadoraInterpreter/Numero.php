<?php 

class Numero implements Expressao{
    private $numero;

    function __construct($numero){
        $this->numero =  $numero;
    }
    public function avalia() {
        return $this->numero;
    }
}