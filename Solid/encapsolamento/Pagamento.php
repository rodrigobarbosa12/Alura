<?php 

    class Pagamento {
        private $valor;
        private $forma;

        public function __construct($valor,$forma) {
            $this->valor = $valor;
            $this->forma = $forma;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getForma() {
            return $this->forma;
        }
    }