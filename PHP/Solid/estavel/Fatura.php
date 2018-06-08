<?php 

    class Fatura {

        private $valorMensal;
        private $cliente;

        public function __construct($valorMensal = null,Cliente $cliente = null) {
            $this->cliente = $cliente;
            $this->valorMensal = $valorMensal;
        }

        public function getValorMensal() {
            return $this->valorMensal;
        }

        public function setValorMensal($valorMensal) {
            $this->valorMensal = $valorMensal;
        }

        public function getCliente() {
            return $this->cliente;
        }

        public function setCliente(Cliente $cliente) {
            $this->cliente = $cliente;
        }
    }