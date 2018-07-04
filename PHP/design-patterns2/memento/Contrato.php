<?php

class Contrato {

    private $data;
    private $cliente;
    private $tipo;

        function __construct($data, $cliente, $tipo){

            $this->data = $data;
            $this->cliente = $cliente;
            $this->tipo = $tipo;
        }

        //Obtem
        public function getData(){
            return $this->data;
        }
        public function getCliente(){
            return $this->cliente;
        }
        public function getTipoConta(){
            return $this->tipo;
        }

        //Atribui
        public function setData($data){
            $this->data = $data;
        }
        public function setCliente($cliente){
            $this->cliente = $cliente;
        }
        public function setTipoConta($tipo){
            $this->tipo = $tipo;
        }

        public function avanca(){
            $this->tipo->avanca($this);
        }


        public function salvaEstado(){
            return new Estado (new Contrato($this->data, $this->cliente, $this->tipo));
        }
        public function restaura($estado){
            $this->data = $estado->getEstado()->getData();//?
            $this->cliente = $estado->getEstado()->getCliente();//?
            $this->tipo = $estado->getEstado()->getTipo();//?
        }



}